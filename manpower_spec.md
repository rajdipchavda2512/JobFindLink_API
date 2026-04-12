# Manpower Hiring App — API Flow & Database Documentation

---

## Table of Contents

1. [System Overview](#system-overview)
2. [Database Tables](#database-tables)
3. [Auth Module](#auth-module)
4. [Employee Module](#employee-module)
5. [Employer Module](#employer-module)
6. [Job & Application Module](#job--application-module)
7. [Package & Payment Module](#package--payment-module)
8. [Notification Module](#notification-module)
9. [Admin Module](#admin-module)

---

## System Overview

```
Client (Mobile/Web)
        │
        ▼
  API Gateway (REST)
        │
  ┌─────┴──────┐
  │  JWT Auth  │
  └─────┬──────┘
        │
  ┌─────┴──────────────────────────────────────┐
  │               Backend Services              │
  │  Auth | Employee | Employer | Admin         │
  │  Jobs | Applications | Packages | Notify   │
  └─────┬──────────────────────────────────────┘
        │
  ┌─────┴──────┐
  │  Database  │  (PostgreSQL / MySQL)
  └────────────┘
```

---

## Database Tables

### `users`

Shared table for both employees and employers.

| Column         | Type         | Constraints              | Description                        |
|----------------|--------------|--------------------------|------------------------------------|
| id             | UUID         | PK, NOT NULL             | Unique user ID                     |
| full_name      | VARCHAR(100) | NOT NULL                 | Full name                          |
| mobile         | VARCHAR(15)  | UNIQUE, NOT NULL         | Mobile number (used for OTP login) |
| email          | VARCHAR(100) | UNIQUE, NULLABLE         | Email (optional)                   |
| password_hash  | VARCHAR(255) | NOT NULL                 | Hashed password                    |
| role           | ENUM         | NOT NULL                 | `employee` / `employer` / `admin`  |
| is_verified    | BOOLEAN      | DEFAULT false            | Mobile OTP verified                |
| is_active      | BOOLEAN      | DEFAULT true             | Account active status              |
| created_at     | TIMESTAMP    | DEFAULT NOW()            | Account creation date              |
| updated_at     | TIMESTAMP    | DEFAULT NOW()            | Last updated                       |

---

### `employee_profiles`

Extended profile details for job seekers.

| Column              | Type         | Constraints   | Description                              |
|---------------------|--------------|---------------|------------------------------------------|
| id                  | UUID         | PK            | Profile ID                               |
| user_id             | UUID         | FK → users.id | Reference to users table                 |
| experience_type     | ENUM         | NOT NULL      | `fresher` / `experienced`                |
| experience_field    | VARCHAR(100) | NULLABLE      | Field if experienced                     |
| preferred_locations | JSON         | NULLABLE      | Array of cities/states                   |
| job_position        | VARCHAR(100) | NULLABLE      | Desired job title                        |
| skills              | JSON         | NULLABLE      | Array of skill tags                      |
| expected_salary     | INT          | NULLABLE      | Monthly expected salary (INR)            |
| age                 | INT          | NULLABLE      | Age                                      |
| gender              | ENUM         | NULLABLE      | `male` / `female` / `other`              |
| job_type            | JSON         | NULLABLE      | `full-time`, `part-time`, etc.           |
| availability        | ENUM         | NULLABLE      | `immediate` / `notice_period`            |
| resume_url          | VARCHAR(255) | NULLABLE      | Uploaded resume file URL                 |
| resume_type         | ENUM         | NULLABLE      | `uploaded` / `built`                     |
| id_document_url     | VARCHAR(255) | NULLABLE      | Aadhaar or Govt ID scan URL              |
| id_verified         | BOOLEAN      | DEFAULT false | Admin-verified ID status                 |
| profile_complete    | BOOLEAN      | DEFAULT false | Profile completion flag                  |
| created_at          | TIMESTAMP    | DEFAULT NOW() |                                          |
| updated_at          | TIMESTAMP    | DEFAULT NOW() |                                          |

---

### `employer_profiles`

Extended profile details for employers/companies.

| Column       | Type         | Constraints   | Description                   |
|--------------|--------------|---------------|-------------------------------|
| id           | UUID         | PK            | Profile ID                    |
| user_id      | UUID         | FK → users.id | Reference to users table      |
| company_name | VARCHAR(150) | NOT NULL      | Company or business name      |
| work_email   | VARCHAR(100) | NULLABLE      | Optional work email           |
| is_verified  | BOOLEAN      | DEFAULT false | Mobile OTP verified           |
| created_at   | TIMESTAMP    | DEFAULT NOW() |                               |
| updated_at   | TIMESTAMP    | DEFAULT NOW() |                               |

---

### `jobs`

All job listings posted by employers.

| Column              | Type         | Constraints              | Description                                      |
|---------------------|--------------|--------------------------|--------------------------------------------------|
| id                  | UUID         | PK                       | Job ID                                           |
| employer_id         | UUID         | FK → users.id            | Employer who posted                              |
| company_name        | VARCHAR(150) | NOT NULL                 | Auto-filled from employer profile                |
| title               | VARCHAR(100) | NOT NULL                 | Job title/designation                            |
| job_type            | ENUM         | NOT NULL                 | `full-time` / `part-time` / `freelance` / `shift`|
| location            | VARCHAR(100) | NOT NULL                 | City/state                                       |
| work_location_type  | ENUM         | NOT NULL                 | `wfh` / `wfo` / `field`                          |
| pay_type            | ENUM         | NOT NULL                 | `fixed` / `range`                                |
| salary_min          | INT          | NULLABLE                 | Minimum monthly salary                           |
| salary_max          | INT          | NULLABLE                 | Maximum monthly salary (if range)                |
| description         | TEXT         | NULLABLE                 | Full job description                             |
| skills_required     | JSON         | NULLABLE                 | Array of required skills                         |
| experience_required | VARCHAR(50)  | NULLABLE                 | e.g. "0-1 years" / "2-5 years"                   |
| perks               | JSON         | NULLABLE                 | `accommodation`, `food`, `bonus`, `travel`        |
| status              | ENUM         | DEFAULT `pending`        | `pending` / `active` / `rejected` / `closed`     |
| is_featured         | BOOLEAN      | DEFAULT false            | Featured listing flag                            |
| views_count         | INT          | DEFAULT 0                | Number of times job was viewed                   |
| created_at          | TIMESTAMP    | DEFAULT NOW()            |                                                  |
| updated_at          | TIMESTAMP    | DEFAULT NOW()            |                                                  |

---

### `applications`

Tracks all job applications made by employees.

| Column         | Type      | Constraints        | Description                                         |
|----------------|-----------|--------------------|-----------------------------------------------------|
| id             | UUID      | PK                 | Application ID                                      |
| job_id         | UUID      | FK → jobs.id       | Reference to job listing                            |
| employee_id    | UUID      | FK → users.id      | Applicant user                                      |
| status         | ENUM      | DEFAULT `applied`  | `applied` / `under_review` / `shortlisted` / `rejected` / `hired` |
| applied_at     | TIMESTAMP | DEFAULT NOW()      | Application timestamp                               |
| updated_at     | TIMESTAMP | DEFAULT NOW()      |                                                     |

---

### `packages`

Subscription plans available for employers.

| Column              | Type         | Constraints   | Description                          |
|---------------------|--------------|---------------|--------------------------------------|
| id                  | UUID         | PK            | Package ID                           |
| name                | VARCHAR(100) | NOT NULL      | Plan name (e.g. "Basic", "Premium")  |
| price               | DECIMAL      | NOT NULL      | Plan price (INR)                     |
| validity_days       | INT          | NOT NULL      | Validity period in days              |
| job_posts_allowed   | INT          | NOT NULL      | Number of job posts included         |
| candidate_db_access | INT          | NOT NULL      | Number of candidate profiles viewable|
| featured_listing    | BOOLEAN      | DEFAULT false | Includes featured job listing        |
| is_active           | BOOLEAN      | DEFAULT true  | Package available for purchase       |
| created_at          | TIMESTAMP    | DEFAULT NOW() |                                      |

---

### `employer_subscriptions`

Tracks which employers have purchased which packages.

| Column       | Type      | Constraints          | Description                    |
|--------------|-----------|----------------------|--------------------------------|
| id           | UUID      | PK                   | Subscription ID                |
| employer_id  | UUID      | FK → users.id        | Employer user                  |
| package_id   | UUID      | FK → packages.id     | Package purchased              |
| starts_at    | TIMESTAMP | NOT NULL             | Subscription start date        |
| expires_at   | TIMESTAMP | NOT NULL             | Subscription expiry date       |
| jobs_used    | INT       | DEFAULT 0            | Jobs posted in this plan       |
| is_active    | BOOLEAN   | DEFAULT true         | Active subscription flag       |
| created_at   | TIMESTAMP | DEFAULT NOW()        |                                |

---

### `payments`

Payment records for package purchases.

| Column         | Type         | Constraints              | Description                              |
|----------------|--------------|--------------------------|------------------------------------------|
| id             | UUID         | PK                       | Payment ID                               |
| employer_id    | UUID         | FK → users.id            | Employer user                            |
| package_id     | UUID         | FK → packages.id         | Package purchased                        |
| amount         | DECIMAL      | NOT NULL                 | Amount paid (INR)                        |
| status         | ENUM         | NOT NULL                 | `pending` / `success` / `failed`         |
| payment_method | VARCHAR(50)  | NULLABLE                 | e.g. "razorpay", "upi", "card"           |
| transaction_id | VARCHAR(100) | UNIQUE, NULLABLE         | Gateway transaction reference            |
| created_at     | TIMESTAMP    | DEFAULT NOW()            |                                          |

---

### `otp_verifications`

Temporary OTP records for mobile verification.

| Column     | Type        | Constraints   | Description                    |
|------------|-------------|---------------|--------------------------------|
| id         | UUID        | PK            | OTP record ID                  |
| mobile     | VARCHAR(15) | NOT NULL      | Mobile number receiving OTP    |
| otp_code   | VARCHAR(6)  | NOT NULL      | 6-digit OTP code               |
| expires_at | TIMESTAMP   | NOT NULL      | OTP expiry (5 min from sent)   |
| is_used    | BOOLEAN     | DEFAULT false | Whether OTP was already used   |
| created_at | TIMESTAMP   | DEFAULT NOW() |                                |

---

### `notifications`

Log of all notifications sent via WhatsApp or Email.

| Column      | Type         | Constraints   | Description                                    |
|-------------|--------------|---------------|------------------------------------------------|
| id          | UUID         | PK            | Notification ID                                |
| user_id     | UUID         | FK → users.id | Recipient user                                 |
| type        | ENUM         | NOT NULL      | `whatsapp` / `email`                           |
| event       | VARCHAR(100) | NOT NULL      | e.g. `new_application`, `status_update`        |
| payload     | JSON         | NULLABLE      | Extra data (job title, applicant name, etc.)   |
| status      | ENUM         | DEFAULT `sent`| `sent` / `failed`                              |
| sent_at     | TIMESTAMP    | DEFAULT NOW() |                                                |

---

## Auth Module

### Flow

```
1. User submits mobile + password
         │
         ▼
2. POST /auth/register  →  Insert into users table
         │
         ▼
3. POST /auth/send-otp  →  Generate 6-digit OTP
                        →  Insert into otp_verifications
                        →  Send SMS to mobile
         │
         ▼
4. POST /auth/verify-otp  →  Check otp_verifications (not expired, not used)
                          →  Mark is_verified = true in users
                          →  Mark is_used = true in otp_verifications
         │
         ▼
5. POST /auth/login  →  Validate credentials
                     →  Issue JWT (access token 15min + refresh token 7d)
         │
         ▼
6. All subsequent API calls → Authorization: Bearer <access_token>
```

### Endpoints

| Method | Endpoint              | Auth Required | Description                     |
|--------|-----------------------|---------------|---------------------------------|
| POST   | /auth/register        | No            | Register new user               |
| POST   | /auth/send-otp        | No            | Send OTP to mobile              |
| POST   | /auth/verify-otp      | No            | Verify OTP and activate account |
| POST   | /auth/login           | No            | Login and get JWT tokens        |
| POST   | /auth/refresh-token   | No            | Get new access token            |
| POST   | /auth/logout          | Yes           | Invalidate refresh token        |
| POST   | /auth/forgot-password | No            | Send OTP for password reset     |
| POST   | /auth/reset-password  | No            | Reset password with OTP         |

---

## Employee Module

### Flow

```
1. Register + OTP verify  (Auth Module)
         │
         ▼
2. PUT /employee/profile  →  Upsert employee_profiles
         │
         ▼
3. POST /employee/upload-resume   →  Upload PDF to storage
   OR POST /employee/build-resume →  Auto-generate branded PDF
         │
         ▼
4. POST /employee/verify-id  →  Upload Aadhaar/Govt ID image
                             →  Flag id_verified = false (pending admin review)
         │
         ▼
5. GET /jobs/matching  →  Query jobs WHERE status = active
                       →  Match on skills, location, job_type from employee_profiles
         │
         ▼
6. GET /jobs/search  →  Filter by title, company, location, salary, job_type
         │
         ▼
7. POST /jobs/:id/apply  →  Check resume uploaded + id_verified
                         →  Insert into applications table
                         →  Trigger notification (WhatsApp to employer, email to both)
         │
         ▼
8. GET /applications/status  →  Query applications by employee_id
```

### Endpoints

| Method | Endpoint                   | Auth    | Description                           |
|--------|----------------------------|---------|---------------------------------------|
| GET    | /employee/profile          | Yes     | Get employee profile                  |
| PUT    | /employee/profile          | Yes     | Create or update profile              |
| POST   | /employee/upload-resume    | Yes     | Upload resume PDF                     |
| POST   | /employee/build-resume     | Yes     | Generate branded resume PDF           |
| POST   | /employee/verify-id        | Yes     | Upload ID document for verification   |
| GET    | /jobs/matching             | Yes     | Get AI-matched job feed               |
| GET    | /jobs/search               | Yes     | Search jobs with filters              |
| GET    | /jobs/:id                  | Yes     | Get single job detail                 |
| POST   | /jobs/:id/apply            | Yes     | Apply to a job                        |
| GET    | /applications              | Yes     | List all applications by employee     |
| GET    | /applications/:id/status   | Yes     | Get application status detail         |

---

## Employer Module

### Flow

```
1. Register + OTP verify  (Auth Module)
         │
         ▼
2. PUT /employer/profile  →  Upsert employer_profiles
         │
         ▼
3. GET /packages  →  List active packages from packages table
         │
         ▼
4. POST /payments/checkout  →  Create payment record (status = pending)
                            →  Redirect to payment gateway
         │
         ▼
5. POST /payments/webhook   →  Gateway callback
                            →  Update payments.status = success
                            →  Insert into employer_subscriptions
         │
         ▼
6. POST /jobs  →  Validate active subscription (check employer_subscriptions)
               →  Check jobs_used < job_posts_allowed
               →  Insert into jobs table (status = pending)
         │
         ▼
7. Admin approves →  jobs.status = active (visible in feed)
         │
         ▼
8. GET /employer/dashboard  →  Aggregate active jobs, candidates, applications
         │
         ▼
9. GET /candidates/search  →  Query employee_profiles (respects db access limit)
         │
         ▼
10. GET /jobs/:id/applicants  →  Query applications by job_id with employee details
```

### Endpoints

| Method | Endpoint                   | Auth    | Description                              |
|--------|----------------------------|---------|------------------------------------------|
| GET    | /employer/profile          | Yes     | Get employer profile                     |
| PUT    | /employer/profile          | Yes     | Update employer profile                  |
| GET    | /employer/dashboard        | Yes     | Dashboard stats (jobs, apps, candidates) |
| POST   | /jobs                      | Yes     | Post a new job                           |
| GET    | /employer/jobs             | Yes     | List employer's own jobs                 |
| PUT    | /jobs/:id                  | Yes     | Edit job listing                         |
| DELETE | /jobs/:id                  | Yes     | Close/delete job listing                 |
| GET    | /jobs/:id/applicants       | Yes     | View applicants for a specific job       |
| PUT    | /applications/:id/status   | Yes     | Update applicant status                  |
| GET    | /candidates/search         | Yes     | Search candidate database                |
| GET    | /packages                  | No      | List all available packages              |
| POST   | /payments/checkout         | Yes     | Initiate package payment                 |
| POST   | /payments/webhook          | No      | Payment gateway callback                 |
| GET    | /employer/subscription     | Yes     | View active subscription details         |

---

## Job & Application Module

### Application Status Flow

```
Employee applies
       │
       ▼
  [applied]  ──▶  WhatsApp to Employer + Email to both
       │
       ▼
 [under_review]  ──▶  Email to Employee
       │
       ▼
 [shortlisted]  ──▶  WhatsApp + Email to Employee
       │
  ┌────┴────┐
  ▼         ▼
[hired]  [rejected]  ──▶  Email notification
```

### Job Matching Logic

```
GET /jobs/matching
       │
       ▼
  Read employee_profiles (skills, location, job_type, expected_salary)
       │
       ▼
  Query jobs WHERE:
    - status = 'active'
    - location IN preferred_locations
    - job_type IN employee job_type preferences
    - salary_max >= expected_salary (if provided)
    - skills_required overlap with employee skills
       │
       ▼
  Return sorted by relevance score
```

---

## Package & Payment Module

### Flow

```
1. GET /packages  →  List plans (packages table)

2. POST /payments/checkout
   Request: { package_id, employer_id }
   →  Create payments record (status = pending)
   →  Generate payment gateway order
   Response: { payment_url, order_id }

3. User completes payment on gateway

4. POST /payments/webhook  (from gateway)
   →  Verify signature
   →  Update payments.status = success / failed
   →  On success: INSERT into employer_subscriptions
      {
        employer_id,
        package_id,
        starts_at: NOW(),
        expires_at: NOW() + validity_days,
        jobs_used: 0,
        is_active: true
      }

5. On each job post:
   →  SELECT * FROM employer_subscriptions
      WHERE employer_id = ? AND is_active = true AND expires_at > NOW()
   →  Check jobs_used < job_posts_allowed
   →  On post: UPDATE employer_subscriptions SET jobs_used = jobs_used + 1
```

### Package Example Data

| Plan    | Price  | Validity | Job Posts | DB Access | Featured |
|---------|--------|----------|-----------|-----------|----------|
| Starter | ₹499   | 7 days   | 2         | 50        | No       |
| Basic   | ₹999   | 30 days  | 5         | 200       | No       |
| Pro     | ₹2499  | 30 days  | 15        | 500       | Yes      |
| Premium | ₹4999  | 60 days  | Unlimited | Unlimited | Yes      |

---

## Notification Module

### Flow

```
Trigger Event (e.g. new application)
         │
         ▼
  Notification Service
         │
    ┌────┴────┐
    ▼         ▼
WhatsApp     Email
  API        SMTP
    │         │
    ▼         ▼
  Insert into notifications table
  { user_id, type, event, status }
```

### Notification Events

| Event                | WhatsApp         | Email            | Recipients           |
|----------------------|------------------|------------------|----------------------|
| New application      | Employer only    | Both             | Employer + Employee  |
| Application reviewed | No               | Employee only    | Employee             |
| Shortlisted          | Employee only    | Employee only    | Employee             |
| Hired / Rejected     | No               | Employee only    | Employee             |
| Job approved         | Employer only    | Employer only    | Employer             |
| Job rejected         | No               | Employer only    | Employer             |
| Package activated    | No               | Employer only    | Employer             |

### Endpoints

| Method | Endpoint              | Auth | Description                       |
|--------|-----------------------|------|-----------------------------------|
| POST   | /notifications/send   | Yes  | Manually trigger a notification   |
| GET    | /notifications        | Yes  | Get notification history for user |

---

## Admin Module

### Flow

```
Admin Login (role = admin)
         │
    ┌────┼────────────┬────────────┐
    ▼    ▼            ▼            ▼
Users   Jobs       Packages    Analytics
    │    │            │            │
 CRUD  Approve/    CRUD plans   Stats query
       Reject
```

### Endpoints

| Method | Endpoint                   | Auth  | Description                        |
|--------|----------------------------|-------|------------------------------------|
| GET    | /admin/users               | Admin | List all users                     |
| PUT    | /admin/users/:id           | Admin | Update user (ban/verify/role)      |
| DELETE | /admin/users/:id           | Admin | Delete user account                |
| GET    | /admin/jobs                | Admin | List all jobs (any status)         |
| PUT    | /admin/jobs/:id/approve    | Admin | Approve job → status = active      |
| PUT    | /admin/jobs/:id/reject     | Admin | Reject job → status = rejected     |
| GET    | /admin/applications        | Admin | List all applications              |
| GET    | /admin/packages            | Admin | List all packages                  |
| POST   | /admin/packages            | Admin | Create new package plan            |
| PUT    | /admin/packages/:id        | Admin | Update package plan                |
| DELETE | /admin/packages/:id        | Admin | Deactivate a package               |
| GET    | /admin/stats               | Admin | Platform analytics summary         |
| GET    | /admin/payments            | Admin | View all payment records           |

### Analytics Stats Response (`GET /admin/stats`)

```json
{
  "total_employees": 4520,
  "total_employers": 310,
  "total_jobs_posted": 850,
  "active_jobs": 220,
  "total_applications": 6800,
  "revenue_total_inr": 485000,
  "packages_sold": 195,
  "whatsapp_notifications_sent": 3200,
  "email_notifications_sent": 9400
}
```

---

## Table Relationships Summary

```
users
  ├── employee_profiles   (1:1 via user_id)
  ├── employer_profiles   (1:1 via user_id)
  ├── applications        (1:N via employee_id)
  ├── jobs                (1:N via employer_id)
  ├── employer_subscriptions (1:N via employer_id)
  ├── payments            (1:N via employer_id)
  └── notifications       (1:N via user_id)

jobs
  └── applications        (1:N via job_id)

packages
  ├── employer_subscriptions (1:N via package_id)
  └── payments               (1:N via package_id)

otp_verifications           (standalone, keyed by mobile)
```

---

*Document version: 1.0 | App: Manpower Hiring App | Platform: Mobile-first (Android) + Web*
