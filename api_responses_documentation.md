# JobFindLink V2 - Entire API Flow Testing Reference

This document maps out the complete end-to-end API lifecycle for both the Employer and Employee workflows, including `POST`, `PUT`, `GET`, and `DELETE` requests. Use these sample payloads/responses to rigorously test the platform.

---

## 1. Authentication Flow (Both Roles)

### A. Register User
**Endpoint:** `POST /api/auth/register`  
**Payload (Form-Data or JSON):**
```json
{
    "full_name": "Jane Smith",
    "mobile": "9876543211",
    "email": "jane@techcorp.com",
    "password": "password123",
    "password_confirmation": "password123",
    "role": "employer",         // OR "employee"
    "company_name": "TechCorp", // only if employer
    "industry_type": "IT"       // only if employer
}
```
**Response (201 Created):**
```json
{
    "success": true,
    "message": "User registered successfully",
    "token": "1|abcdef123456...",
    "data": { "id": 1, "role": "employer", "is_verified": false }
}
```

### B. Verify OTP (If mandatory for login/registration)
**Endpoint:** `POST /api/auth/verify-otp`  
**Payload:** `{"mobile": "9876543211", "otp_code": "123456"}`

---

## 2. Employer Flow: Creating and Managing Jobs

### A. Create a New Job
**Endpoint:** `POST /api/jobs`  
**Middleware:** `auth:sanctum`, `role:employer`  
**Payload:**
```json
{
    "title": "Senior PHP Developer",
    "category_id": 1,
    "job_type": "full-time",
    "location": "Mumbai",
    "work_location_type": "wfh",
    "pay_type": "range",
    "salary_min": 60000,
    "salary_max": 90000,
    "description": "Looking for 5 yrs experience in Laravel.",
    "skills_required": ["PHP", "Laravel", "MySQL"],
    "is_draft": false
}
```
**Response (201 Created):**
```json
{
    "success": true,
    "message": "Job posted successfully. Pending admin approval.",
    "data": {
        "id": 12,
        "title": "Senior PHP Developer",
        "status": "pending"
    }
}
```

### B. Update Job Status
**Endpoint:** `PUT /api/jobs/12/status`  
**Middleware:** `auth:sanctum`, `role:employer`  
**Payload:** `{"status": "active"}` *(options: paused, closed, active)*  
**Response:**
```json
{
    "success": true,
    "message": "Job active successfully.",
    "data": { "status": "active" }
}
```

---

## 3. Employee Flow: Searching & Applying

### A. Search for Jobs
**Endpoint:** `GET /api/jobs/search?q=PHP&work_location_type=wfh`  
**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 12,
            "title": "Senior PHP Developer",
            "company_name": "TechCorp",
            "salary_min": 60000,
            "salary_max": 90000
        }
    ]
}
```

### B. Upload Resume & Verify Govt ID (Mandatory pre-requisites)
**Resume Upload (POST /api/employee/upload-resume):**
*Must use `multipart/form-data` with key `resume` containing the PDF file.*

**Govt ID Upload (POST /api/employee/verify-id):**
*Must use `multipart/form-data` with keys `aadhaar_number` and `id_document_front`.*

### C. Apply for the Job
**Endpoint:** `POST /api/jobs/12/apply`  
**Middleware:** `auth:sanctum`, `role:employee`  
**Payload:**
```json
{
    "apply_method": "existing",
    "cover_note": "I am highly interested in this WFH opportunity."
}
```
**Response (201 Created):**
```json
{
    "success": true,
    "message": "Application submitted successfully.",
    "data": {
        "id": 501,
        "job_id": 12,
        "status": "applied",
        "applied_at": "2026-04-21T10:00:00Z"
    }
}
```

---

## 4. Employer Flow: Managing Applications

### A. View Applicants for a specific Job
**Endpoint:** `GET /api/jobs/12/applicants`  
**Middleware:** `auth:sanctum`, `role:employer`  
**Response:** Lists the employee (ID 501) who just applied.

### B. Change Applicant Status (Shortlist/Hire/Reject)
**Endpoint:** `PUT /api/employer/applications/501/status`  
**Middleware:** `auth:sanctum`, `role:employer`  
**Payload:** `{"status": "shortlisted"}`  
**Response:**
```json
{
    "success": true,
    "message": "Application status updated successfully.",
    "data": {
        "id": 501,
        "status": "shortlisted"
    }
}
```

---

## 5. Teardown / Cleanup Options
- **Delete Job:** `DELETE /api/jobs/12` (Employer Route)
- **Unsave Job:** `POST /api/jobs/12/save` (Employee Route that toggles save/unsave)
- **Logout:** `POST /api/auth/logout`
