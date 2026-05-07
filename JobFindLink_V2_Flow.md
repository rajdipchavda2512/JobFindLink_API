# JobFindLink API v2 — Complete Flow Documentation

> **Base URL:** `http://your-domain.com/api`
> **Auth:** Bearer Token (Sanctum)
> **Content-Type:** `application/json`

---

## Table of Contents
1. [Architecture Overview](#architecture-overview)
2. [Auth Flow](#auth-flow)
3. [Employer Registration & Login](#employer-registration--login)
4. [Employee Registration & 7-Step Profile](#employee-registration--7-step-profile)
5. [Job Management APIs](#job-management-apis)
6. [Application APIs](#application-apis)
7. [Notifications](#notifications)
8. [Master Data APIs](#master-data-apis)
9. [Error Responses](#error-responses)
10. [App Screen Flow Diagram](#app-screen-flow-diagram)

---

## Architecture Overview

### Folder Structure
```
app/
├── Http/
│   ├── Controllers/
│   │   └── Api/
│   │       ├── AuthController.php            ← OTP, register, login, profile
│   │       ├── EmployeeController.php         ← Employee dashboard, settings
│   │       ├── EmployeeProfileController.php  ← 7-Step profile builder
│   │       ├── EmployerController.php         ← Employer dashboard, profile
│   │       ├── JobController.php              ← Job CRUD & search
│   │       ├── ApplicationController.php      ← Job applications
│   │       ├── CategoryController.php         ← Job categories
│   │       ├── LocationController.php         ← Gujarat districts
│   │       ├── NotificationController.php     ← Push/system notifications
│   │       ├── PackageController.php          ← Employer subscription packages
│   │       └── PositionController.php         ← Job positions/titles
│   └── Middleware/
│       ├── CheckRole.php                      ← role:employee|employer|admin
│       └── AdminMiddleware.php
├── Models/
│   ├── User.php              ← Core auth user (role: employee|employer|admin)
│   ├── Employee.php          ← Employee profile (7-step, links to User)
│   ├── EmployeeProfile.php   ← Legacy profile model (kept for backward compat)
│   ├── EmployerProfile.php   ← Employer company profile
│   └── ...
database/migrations/
├── 0001_01_01_000000_create_users_table.php
├── 2026_04_09_* (core tables: profiles, jobs, applications, etc.)
├── 2026_04_26_000001_create_employees_table.php  ← NEW: main employee profile table
├── 2026_05_07_000001_add_v2_flow_fields.php      ← NEW: v2 additional fields
└── ...
```

### Data Model
```
users (id, full_name, mobile, email, password, role, is_verified, profile_setup_complete)
  ↓
employees (id, user_id, profile_step 0–7, seeking_position, skills, languages, ...)
  ↓
employer_profiles (id, user_id, company_name, location, company_size, email, ...)
```

---

## Auth Flow

### Complete Authentication Flow

```
App Open
   │
   ▼
[Splash Screen]
   │
   ▼
[Login Screen]
   │ Enter 10-digit mobile number
   ▼
POST /api/auth/send-otp
   │
   ▼
[OTP Input Screen]  ←── Auto-detect / Manual entry
   │ Enter 6-digit OTP
   ▼
POST /api/auth/verify-otp
   │
   ├─── is_new_user: false ──────────────────────────────► [Dashboard]
   │
   └─── is_new_user: true  ──► [Select Account Type Screen]
                                    │
                          ┌─────────┴─────────┐
                          ▼                   ▼
                    [Employee]           [Employer]
                          │                   │
                          ▼                   ▼
             POST /api/auth/         POST /api/auth/
             employee/register       employer/register
                          │                   │
                          ▼                   ▼
                  [Upload Resume]      [Employer Dashboard]
                  (Skip allowed)
                          │
                          ▼
                 [7-Step Profile Setup]
                          │
                          ▼
                   [Employee Dashboard]
```

---

## OTP Endpoints

### 1. Send OTP

```
POST /api/auth/send-otp
```

**Request:**
```json
{
  "mobile": "9876543210",
  "purpose": "register"
}
```
> `purpose`: `register` | `login` | `verify` | `forgot_password` | `resend`
> Mobile must be 10 digits, starting with 6–9 (Indian format).

**Response:**
```json
{
  "success": true,
  "message": "OTP sent to your mobile number.",
  "otp_code": "123456",
  "expires_in_seconds": 300
}
```

---

### 2. Resend OTP

```
POST /api/auth/resend-otp
```

**Request:**
```json
{
  "mobile": "9876543210"
}
```

**Rate Limit:** 3 requests per 10 minutes.

---

### 3. Verify OTP

```
POST /api/auth/verify-otp
```

**Request:**
```json
{
  "mobile": "9876543210",
  "otp_code": "123456"
}
```

**Response — Existing User (Login):**
```json
{
  "success": true,
  "message": "OTP verified. Welcome back!",
  "is_new_user": false,
  "data": {
    "user": { "id": 1, "full_name": "John Doe", "role": "employee", "profile_setup_complete": true },
    "profile": { ... },
    "access_token": "Bearer_token_here",
    "refresh_token": "refresh_token_here",
    "token_type": "Bearer"
  }
}
```

**Response — New User:**
```json
{
  "success": true,
  "message": "Mobile verified. Please select your account type.",
  "is_new_user": true,
  "mobile": "9876543210",
  "temp_token": "base64_encoded_temp_token"
}
```
> Store `temp_token` — required for registration in next step (valid 30 minutes).

---

## Employer Registration & Login

### Employer Registration (After OTP)

```
POST /api/auth/employer/register
```

**Request:**
```json
{
  "mobile": "9876543210",
  "temp_token": "base64_temp_token_from_verify_otp",
  "company_name": "TechCorp Pvt Ltd",
  "email": "hr@techcorp.com",
  "password": "secret123",
  "password_confirmation": "secret123",
  "location": "Ahmedabad, Gujarat",
  "company_size": "50-200"
}
```

**Fields:**
| Field | Required | Description |
|-------|----------|-------------|
| `mobile` | ✅ | 10-digit mobile (same as OTP) |
| `temp_token` | ✅ | Token from `/verify-otp` |
| `company_name` | ✅ | Company full name |
| `email` | ✅ | Work email (unique) |
| `password` | ✅ | Min 6 chars |
| `location` | ✅ | City/State |
| `company_size` | ✅ | e.g., "1-10", "11-50", "50-200", "200+" |

**Response:** `201 Created`
```json
{
  "success": true,
  "message": "Employer account created successfully.",
  "data": {
    "user": { "id": 2, "role": "employer", ... },
    "profile": { "company_name": "TechCorp Pvt Ltd", "location": "Ahmedabad", ... },
    "access_token": "...",
    "refresh_token": "...",
    "token_type": "Bearer"
  }
}
```

---

### Employer Login (Email + Password)

```
POST /api/auth/employer/login
```

**Request:**
```json
{
  "email": "hr@techcorp.com",
  "password": "secret123"
}
```

---

### Employer Forgot Password

```
POST /api/auth/forgot-password
```
```json
{ "email": "hr@techcorp.com" }
```

---

## Employee Registration & 7-Step Profile

### Employee Registration (After OTP)

```
POST /api/auth/employee/register
```

**Request:**
```json
{
  "mobile": "9876543210",
  "temp_token": "base64_temp_token_from_verify_otp"
}
```

**Response:** `201 Created`
```json
{
  "success": true,
  "message": "Employee account created. Please complete your profile.",
  "data": {
    "user": { "id": 3, "role": "employee", "profile_setup_complete": false },
    "profile_step": 0,
    "next_step": "upload_resume",
    "access_token": "...",
    "refresh_token": "...",
    "token_type": "Bearer"
  }
}
```

---

### Step 0: Upload Resume (Optional)

```
POST /api/employee/profile/upload-resume
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**To Upload Resume:**
```
resume: [PDF/DOC file, max 5MB]
```

**To Skip:**
```json
{ "skip": true }
```

**Response:**
```json
{
  "success": true,
  "message": "Resume uploaded successfully.",
  "resume_url": "https://your-domain.com/storage/resumes/3/cv.pdf",
  "profile_step": 1,
  "next_step": 1
}
```

---

### Step 1: Basic Details

```
POST /api/employee/profile/step/1
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

| Field | Required | Description |
|-------|----------|-------------|
| `full_name` | ✅ | Full name (max 100 chars) |
| `mobile_number` | ❌ | Alternative contact number (defaults to registered mobile) |
| `email` | ❌ | Email address |
| `gender` | ✅ | `male` / `female` / `other` |
| `profile_photo` | ❌ | JPG/PNG image (max 2MB) |

**Response:**
```json
{
  "success": true,
  "message": "Basic details saved.",
  "profile_step": 1,
  "next_step": 2,
  "data": { "full_name": "John Doe", "gender": "male", ... }
}
```

---

### Step 2: Job Preference

```
POST /api/employee/profile/step/2
Authorization: Bearer {token}
```

**Request:**
```json
{
  "seeking_position": "Software Developer",
  "experience_type": "experienced",
  "exp_years": 3,
  "exp_months": 6
}
```

| Field | Required | Values |
|-------|----------|--------|
| `seeking_position` | ✅ | e.g., "Software Developer", "Sales Manager" |
| `experience_type` | ✅ | `fresher` / `experienced` |
| `exp_years` | If experienced | Integer 0–40 |
| `exp_months` | If experienced | Integer 0–11 |

---

### Step 3: Location & Salary

```
POST /api/employee/profile/step/3
Authorization: Bearer {token}
```

**Request:**
```json
{
  "preferred_locations": ["Ahmedabad", "Surat", "Vadodara"],
  "current_salary": 25000,
  "expected_salary": 35000
}
```

| Field | Required | Description |
|-------|----------|-------------|
| `preferred_locations` | ✅ | Array of city names (use `/api/locations/gujarat-districts` for suggestions) |
| `current_salary` | ❌ | Monthly salary in ₹ |
| `expected_salary` | ❌ | Monthly expected salary in ₹ |

---

### Step 4: Skills & Languages

```
POST /api/employee/profile/step/4
Authorization: Bearer {token}
```

**Request:**
```json
{
  "skills": ["Laravel", "PHP", "MySQL", "JavaScript"],
  "languages": ["Gujarati", "Hindi", "English"]
}
```

| Field | Required | Description |
|-------|----------|-------------|
| `skills` | ✅ | Array of skill strings (min 1) |
| `languages` | ❌ | Array of language strings |

---

### Step 5: Education (Optional)

```
POST /api/employee/profile/step/5
Authorization: Bearer {token}
```

**To Skip:**
```json
{ "skip": true }
```

**To Fill:**
```json
{
  "education_level": "graduate",
  "college_name": "Gujarat University",
  "degree_name": "Bachelor of Engineering",
  "specialisation": "Computer Science"
}
```

| `education_level` Values |
|--------------------------|
| `below_10th` |
| `10th` |
| `12th` |
| `diploma` |
| `graduate` |
| `post_graduate` |
| `phd` |

> `college_name` and `degree_name` required for `diploma`, `graduate`, `post_graduate`, `phd`.

---

### Step 6: Work Experience (Optional)

```
POST /api/employee/profile/step/6
Authorization: Bearer {token}
```

**To Skip:**
```json
{ "skip": true }
```

**To Fill:**
```json
{
  "company_name": "TechStartup Pvt Ltd",
  "industry_sector": "Information Technology",
  "employment_type": "full-time",
  "start_date": "2022-06-01",
  "end_date": null,
  "currently_working": true,
  "notice_period": "30 days"
}
```

| Field | Required | Values / Notes |
|-------|----------|---------------|
| `company_name` | ✅ | Current/previous employer |
| `industry_sector` | ✅ | e.g., "IT", "Manufacturing", "Retail" |
| `employment_type` | ✅ | `full-time` / `part-time` / `shift` / `contract` |
| `start_date` | ✅ | YYYY-MM-DD |
| `end_date` | If not current | YYYY-MM-DD |
| `currently_working` | ❌ | `true` / `false` |
| `notice_period` | ❌ | e.g., "Immediate", "15 days", "30 days", "60 days" |

---

### Step 7: Resume & Availability (Final Step)

```
POST /api/employee/profile/step/7
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

| Field | Required | Values |
|-------|----------|--------|
| `availability` | ✅ | `immediately` / `within_7_days` / `flexible` |
| `resume` | ❌ | PDF/DOC (if not uploaded in Step 0) |

**Response:**
```json
{
  "success": true,
  "message": "Profile setup complete! You are ready to find jobs.",
  "profile_step": 7,
  "profile_completed": true,
  "data": { ... full employee profile ... }
}
```

---

### Get Full Profile (Any Step)

```
GET /api/employee/profile
Authorization: Bearer {token}
```

**Response:**
```json
{
  "success": true,
  "profile_step": 4,
  "data": {
    "id": 1,
    "user_id": 3,
    "full_name": "John Doe",
    "seeking_position": "Software Developer",
    "experience_type": "experienced",
    "skills_json": ["Laravel", "PHP"],
    "languages": ["Gujarati", "Hindi"],
    "preferred_locations": ["Ahmedabad", "Surat"],
    "expected_salary": 35000,
    "profile_step": 4,
    "profile_completed": false
  }
}
```

---

## Employee Dashboard & Settings

### Dashboard

```
GET /api/employee/dashboard
Authorization: Bearer {token}
```

### Update Profile (Bulk Update)

```
PUT /api/employee/profile
Authorization: Bearer {token}
```

### Upload Resume

```
POST /api/employee/upload-resume
Authorization: Bearer {token}
Content-Type: multipart/form-data
Body: resume [PDF, max 5MB]
```

### Saved Jobs

```
GET /api/employee/saved-jobs
Authorization: Bearer {token}
```

### My Applications

```
GET /api/employee/applications
Authorization: Bearer {token}
```

---

## Employer Profile & Dashboard

### Get Employer Profile

```
GET /api/employer/profile
Authorization: Bearer {token}
```

### Update Employer Profile

```
PUT /api/employer/profile
Authorization: Bearer {token}
```

**Body (optional fields):**
```json
{
  "company_name": "TechCorp Pvt Ltd",
  "location": "Ahmedabad, Gujarat",
  "company_size": "50-200",
  "industry_type": "Information Technology",
  "company_website": "https://techcorp.com",
  "company_description": "We build software solutions..."
}
```

### Employer Dashboard

```
GET /api/employer/dashboard
Authorization: Bearer {token}
```

---

## Job Management APIs

### List Jobs (Public)

```
GET /api/jobs
GET /api/jobs?category_id=1&location=Ahmedabad&job_type=full-time
```

### Search Jobs (Public)

```
GET /api/jobs/search?q=developer&location=Ahmedabad
```

### Job Detail (Public)

```
GET /api/jobs/{id}
```

### Create Job (Employer only)

```
POST /api/jobs
Authorization: Bearer {token}
```

**Body:**
```json
{
  "title": "PHP Developer",
  "job_type": "full-time",
  "location": "Ahmedabad",
  "work_location_type": "wfo",
  "pay_type": "range",
  "salary_min": 20000,
  "salary_max": 35000,
  "description": "We are looking for...",
  "skills_required": ["PHP", "Laravel", "MySQL"],
  "experience_required": "1-3 years",
  "application_deadline": "2026-06-01",
  "max_applicants": 50
}
```

### Apply for Job (Employee only)

```
POST /api/jobs/{id}/apply
Authorization: Bearer {token}
```

```json
{
  "cover_note": "I am interested in this role...",
  "resume_url": "https://..."
}
```

### Save/Unsave Job (Employee only)

```
POST /api/jobs/{id}/save
Authorization: Bearer {token}
```

### Job Applicants (Employer only)

```
GET /api/jobs/{id}/applicants
Authorization: Bearer {token}
```

---

## Application APIs

### My Applications (Employee)

```
GET /api/employee/applications
Authorization: Bearer {token}
```

### All Applications (Employer)

```
GET /api/employer/applications
Authorization: Bearer {token}
```

### Update Application Status (Employer)

```
PUT /api/employer/applications/{id}/status
Authorization: Bearer {token}
```

```json
{
  "status": "shortlisted"
}
```

> Status values: `pending` | `under_review` | `shortlisted` | `rejected` | `hired`

---

## Notifications

```
GET  /api/notifications                          ← All notifications
GET  /api/notifications/unread-count             ← Count of unread
PUT  /api/notifications/read-all                 ← Mark all as read
PUT  /api/notifications/{id}/read               ← Mark one as read
```

---

## Master Data APIs

### Gujarat Districts

```
GET /api/locations/gujarat-districts
```

**Response:**
```json
{
  "success": true,
  "data": ["Ahmedabad", "Surat", "Vadodara", "Rajkot", "Bhavnagar", ...]
}
```

### Job Categories

```
GET /api/categories
GET /api/categories/{id}
GET /api/categories/{id}/jobs
```

### Job Positions / Titles

```
GET  /api/positions           ← All active positions
GET  /api/positions/{id}      ← Position detail
POST /api/positions           ← Suggest new position (auth required)
```

---

## Common Auth Endpoints

| Endpoint | Method | Auth | Description |
|----------|--------|------|-------------|
| `/api/auth/logout` | POST | ✅ | Revoke all tokens |
| `/api/auth/refresh-token` | POST | ✅ | Get new access/refresh token |
| `/api/auth/profile` | GET | ✅ | Get current user + profile |
| `/api/auth/change-password` | POST | ✅ | Change password (employers) |
| `/api/auth/change-mobile` | POST | ✅ | Change mobile with OTP |
| `/api/auth/forgot-password` | POST | ❌ | Request OTP for reset |
| `/api/auth/reset-password` | POST | ❌ | Submit new password with OTP |

---

## Error Responses

### Standard Error Format

```json
{
  "success": false,
  "message": "Description of the error."
}
```

### Validation Error (422)

```json
{
  "message": "The mobile field must be 10 digits.",
  "errors": {
    "mobile": ["The mobile field must be 10 digits."]
  }
}
```

### Common HTTP Status Codes

| Code | Meaning |
|------|---------|
| `200` | Success |
| `201` | Created |
| `401` | Unauthenticated |
| `403` | Forbidden (wrong role) |
| `404` | Not Found |
| `422` | Validation / Business Logic Error |
| `429` | Rate Limited (OTP) |

---

## App Screen Flow Diagram

```
SPLASH SCREEN
      │
      ▼
LOGIN SCREEN
  [10-digit mobile input]
      │
      ▼
  [Send OTP] → POST /api/auth/send-otp
      │
      ▼
OTP SCREEN
  [6-digit input]
  [Auto-detect OTP from SMS]
  [Resend OTP] → POST /api/auth/resend-otp
      │
      ▼
  [Verify] → POST /api/auth/verify-otp
      │
      ├─ is_new_user: false ──────────────────────► DASHBOARD (by role)
      │
      └─ is_new_user: true
              │
              ▼
    USER TYPE SELECTION
    ┌──────────────────────┐
    │  [Employee/Candidate] │  [Employer/Company]  │
    └──────────────────────┘
              │                        │
              ▼                        ▼
    POST /api/auth/         POST /api/auth/
    employee/register       employer/register
              │             (Company, Email,        
              │              Password, Location,     
              │              Company Size)           
              │                        │
              ▼                        ▼
    UPLOAD RESUME              EMPLOYER DASHBOARD
    (Skip option)
              │
              ▼
    POST /api/employee/profile/upload-resume
              │
              ▼
    ┌─────────────────────────────────────┐
    │         7-STEP PROFILE SETUP        │
    ├─────────────────────────────────────┤
    │ Step 1: Basic Details               │
    │   - Full Name                       │
    │   - Mobile Number (same or other)   │
    │   - Email (optional)               │
    │   - Gender                          │
    │   - Profile Photo (optional)        │
    ├─────────────────────────────────────┤
    │ Step 2: Job Preference              │
    │   - Position (search + suggestions) │
    │   - Experience: Fresher/Experienced │
    │   - If experienced: Years & Months  │
    ├─────────────────────────────────────┤
    │ Step 3: Location & Salary           │
    │   - Preferred Location (multi-select│
    │   - Current Salary                  │
    │   - Expected Salary                 │
    ├─────────────────────────────────────┤
    │ Step 4: Skills & Languages          │
    │   - Skills (textarea + add more)    │
    │   - Languages (multi-select)        │
    ├─────────────────────────────────────┤
    │ Step 5: Education (Optional)        │
    │   - Education Level                 │
    │   - College Name (if above 12th)    │
    │   - Degree/Course (if above 12th)   │
    │   - Specialization (optional)       │
    ├─────────────────────────────────────┤
    │ Step 6: Work Experience (Optional)  │
    │   - Company Name                    │
    │   - Industry Sector                 │
    │   - Employment Type                 │
    │   - Start & End Date                │
    │   - Currently Working checkbox      │
    │   - Notice Period                   │
    ├─────────────────────────────────────┤
    │ Step 7: Resume & Availability       │
    │   - Upload Resume (if not done)     │
    │   - Availability:                   │
    │     Immediately / Within 7 Days /   │
    │     Flexible                        │
    └─────────────────────────────────────┘
              │
              ▼
    EMPLOYEE DASHBOARD
```

---

## Token Management

| Token | Expiry | Usage |
|-------|--------|-------|
| `access_token` | 30 days | All authenticated API requests |
| `refresh_token` | 90 days | Get new access token via `/auth/refresh-token` |
| `temp_token` | 30 minutes | Registration flow (after OTP verify, before register) |

### Authorization Header

```
Authorization: Bearer {access_token}
```

---

## Changelog

### v2.0 (2026-05-07)
- ✅ **New OTP flow**: 10-digit Indian mobile validation, purpose tracking
- ✅ **Temp token flow**: Secure registration after OTP without a pre-existing account
- ✅ **Separated login endpoints**: `/employer/login` (email+password) vs `/employee/login` (mobile+OTP)
- ✅ **Employer registration**: Now requires location + company_size
- ✅ **7-step employee profile**: Step-by-step profile builder via dedicated endpoints
- ✅ **Employee model**: New `employees` table (separate from `employee_profiles`)
- ✅ **Migration fixes**: Resolved ordering issues, named class → anonymous class, duplicate location migration
- ✅ **Spatie Permission**: Installed v6.25 (compatible with PHP 8.2)
- ✅ **Removed**: Skip button on login screen (mobile verify is now mandatory)

### v1.x
- Initial API implementation
