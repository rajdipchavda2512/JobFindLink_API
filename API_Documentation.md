# JobFindLink API Flow Reference

This document outlines the API flows, highlighting exactly **when to call** each endpoint, the **request parameters**, and the expected **JSON responses**.

---

## 1. Employee Authentication & Setup Flow

### Register Employee
**When to call:** When a job seeker fills out the sign-up form for the first time.
**API endpoint:** `POST /api/auth/register`
**API request parameters:**
- `role` (string, required) - MUST be `employee`
- `full_name` (string, required)
- `mobile` (string, required)
- `email` (string, required)
- `password` (string, required)
- `password_confirmation` (string, required)
- `age` (numeric, optional)
- `gender` (string, optional)
- `seeking_position` (string, optional)
- `experience_type` (string, optional)

**API response:**
```json
{
  "success": true,
  "message": "Registration successful. Please verify your mobile with OTP.",
  "user": {
    "id": 1,
    "full_name": "John Doe",
    "mobile": "9876543210",
    "email": "john@example.com",
    "role": "employee"
  }
}
```

### Send OTP
**When to call:** If the user did not receive the OTP during registration or needs to verify their number later.
**API endpoint:** `POST /api/auth/send-otp`
**API request parameters:**
- `mobile` (string, required)
- `purpose` (string, required) - e.g., `verify` or `login`

**API response:**
```json
{
  "success": true,
  "message": "OTP sent successfully.",
  "expires_in_seconds": 300
}
```

### Verify OTP
**When to call:** When the employee submits the 6-digit OTP code received via SMS.
**API endpoint:** `POST /api/auth/verify-otp`
**API request parameters:**
- `mobile` (string, required)
- `otp_code` (string, required)

**API response:**
```json
{
  "success": true,
  "message": "Mobile number verified successfully. You are now logged in.",
  "data": {
    "user": {
      "id": 1,
      "full_name": "John Doe",
      "mobile": "9876543210",
      "role": "employee",
      "is_verified": true
    },
    "profile": { ... },
    "access_token": "1|eyJ...",
    "refresh_token": "2|fk8...",
    "token_type": "Bearer"
  }
}
```

### Employee Login
**When to call:** When a registered employee wants to log into their account.
**API endpoint:** `POST /api/auth/login`
**API request parameters:**
- `mobile` (string, required)
- `otp_code` (string, required)

**API response:**
```json
{
  "success": true,
  "message": "Login successful.",
  "data": {
    "user": {
      "id": 1,
      "full_name": "John Doe",
      "mobile": "9876543210",
      "email": "john@example.com",
      "role": "employee",
      "is_verified": true
    },
    "profile": {
      "age": 26,
      "job_position": "PHP Developer",
      "experience_type": "experienced"
    },
    "access_token": "1|eyJ...",
    "refresh_token": "2|fk8...",
    "token_type": "Bearer"
  }
}
```

---

## 2. Employer Authentication & Setup Flow

### Register Employer
**When to call:** When a company HR or representative is creating a new employer account.
**API endpoint:** `POST /api/auth/register`
**API request parameters:**
- `role` (string, required) - MUST be `employer`
- `full_name` (string, required)
- `mobile` (string, required)
- `email` (string, required)
- `password` (string, required)
- `password_confirmation` (string, required)
- `company_name` (string, required)
- `designation` (string, optional)
- `industry_type` (string, optional)
- `company_size` (string, optional)

**API response:**
```json
{
  "success": true,
  "message": "Registration successful. Please verify your mobile with OTP.",
  "user": {
    "id": 2,
    "full_name": "Jane Smith",
    "email": "hr@techcorp.com",
    "role": "employer"
  }
}
```

### Employer Login
**When to call:** When a registered employer logs back into the platform.
**API endpoint:** `POST /api/auth/login`
**API request parameters:**
- `email` (string, required)
- `password` (string, required)

**API response:**
```json
{
  "success": true,
  "message": "Login successful.",
  "data": {
    "user": {
      "id": 2,
      "full_name": "Jane Smith",
      "email": "hr@techcorp.com",
      "role": "employer",
      "is_verified": true
    },
    "profile": {
      "company_name": "TechCorp Global",
      "industry_type": "IT Services"
    },
    "access_token": "3|aVc...",
    "refresh_token": "4|xZq...",
    "token_type": "Bearer"
  }
}
```

---

## 3. Employee Dashboard & Profile Flow
*(Requires Bearer Token)*

### Get Dashboard Details
**When to call:** When the employee app/web homepage loads to show top jobs, progress, and stats.
**API endpoint:** `GET /api/employee/dashboard`
**API request parameters:** None
**API response:**
```json
{
  "success": true,
  "data": {
    "profile_completion": 80,
    "total_applications": 5,
    "recommended_jobs": [
      { "id": 10, "title": "Senior PHP Dev", "location": "Mumbai" }
    ]
  }
}
```

### Update Profile
**When to call:** When an employee edits their details from the "My Profile" section.
**API endpoint:** `PUT /api/employee/profile`
**API request parameters:** (Form URL-Encoded)
- `job_position` (string, optional)
- `experience_type` (string, optional)
- `expected_salary` (string, optional)

**API response:**
```json
{
  "success": true,
  "message": "Profile updated successfully.",
  "data": { ...updated profile details... }
}
```

### Upload Resume
**When to call:** When an employee browses and selects a PDF/Doc file to use as their resume.
**API endpoint:** `POST /api/employee/upload-resume`
**API request parameters:** (Form-Data)
- `resume` (file, required)

**API response:**
```json
{
  "success": true,
  "message": "Resume uploaded successfully.",
  "file_url": "https://domain.com/storage/resumes/123.pdf"
}
```

### Verify ID (Aadhaar/PAN)
**When to call:** When an employee needs to get a "Verified Worker" badge by submitting govt ID proofs.
**API endpoint:** `POST /api/employee/verify-id`
**API request parameters:** (Form-Data)
- `aadhaar_number` (string, optional)
- `id_document_front` (file, required)
- `id_document_back` (file, required)

**API response:**
```json
{
  "success": true,
  "message": "ID document submitted for verification.",
  "data": {
    "status": "pending_admin_approval"
  }
}
```

---

## 4. Employer Dashboard & Job Management Flow
*(Requires Bearer Token)*

### Get Dashboard Data
**When to call:** When the employer lands on their homepage after login to see metrics.
**API endpoint:** `GET /api/employer/dashboard`
**API request parameters:** None
**API response:**
```json
{
  "success": true,
  "data": {
    "active_jobs_count": 3,
    "total_applicants": 12,
    "recent_applicants": [
      { "id": 5, "name": "John Doe", "applied_for": "PHP Developer" }
    ]
  }
}
```

### Post a New Job
**When to call:** When an employer submits the "Create Job" form.
**API endpoint:** `POST /api/jobs`
**API request parameters:** (Form URL-Encoded)
- `title` (string, required)
- `job_type` (string, required) - e.g., `full-time`, `part-time`
- `location` (string, required)
- `pay_type` (string, optional)
- `salary_min` (numeric, optional)
- `salary_max` (numeric, optional)
- `description` (text, required)

**API response:**
```json
{
  "success": true,
  "message": "Job posted successfully.",
  "data": {
    "id": 1,
    "title": "Senior PHP Developer",
    "status": "published"
  }
}
```

### Get Job Analytics
**When to call:** When an employer clicks on a specific job to track performance.
**API endpoint:** `GET /api/jobs/{id}/analytics`
**API request parameters:** `id` in URL route
**API response:**
```json
{
  "success": true,
  "data": {
    "job_id": 1,
    "views": 150,
    "applications": 12
  }
}
```

---

## 5. Job Application Flow
*(Requires Bearer Token for Employees)*

### Search/List Jobs
**When to call:** When an employee navigates to the "Find Jobs" screen.
**API endpoint:** `GET /api/jobs/search`
**API request parameters:** (Query Params)
- `q` (string, optional) - search keyword
- `work_location_type` (string, optional) - e.g., `wfh`

**API response:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Senior PHP Developer",
      "company": "TechCorp Global",
      "salary_range": "50000 - 90000"
    }
  ]
}
```

### Apply To Job
**When to call:** When an employee clicks "Apply Now" on a job detail screen.
**API endpoint:** `POST /api/jobs/{id}/apply`
**API request parameters:**
- `apply_method` (string, optional) - e.g., `existing_resume`
- `cover_note` (string, optional)

**API response:**
```json
{
  "success": true,
  "message": "Successfully applied for this job."
}
```
