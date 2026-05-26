<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Truncate the table
        Schema::disableForeignKeyConstraints();
        DB::table('positions')->truncate();
        Schema::enableForeignKeyConstraints();
        
        $now = Carbon::now();
        
        $positions = [
            // ========== IT & Software Development ==========
            ['name' => 'Software Engineer', 'description' => 'Design, develop, and maintain software applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Senior Software Engineer', 'description' => 'Lead software development projects and mentor junior developers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Full Stack Developer', 'description' => 'Work on both front-end and back-end development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Frontend Developer', 'description' => 'Create responsive and interactive user interfaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Backend Developer', 'description' => 'Build and maintain server-side logic and databases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'DevOps Engineer', 'description' => 'Manage deployment, automation, and infrastructure', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cloud Architect', 'description' => 'Design and implement cloud solutions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Database Administrator', 'description' => 'Manage and optimize database systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'System Administrator', 'description' => 'Maintain and manage IT infrastructure', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Network Engineer', 'description' => 'Design and manage computer networks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Security Analyst', 'description' => 'Protect systems from cyber threats', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'QA Engineer', 'description' => 'Test software and ensure quality standards', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Technical Lead', 'description' => 'Lead technical teams and architecture decisions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Engineering Manager', 'description' => 'Manage engineering teams and project delivery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'CTO', 'description' => 'Chief Technology Officer - Lead technology strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Software Architect', 'description' => 'Design high-level software architecture', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mobile Developer (iOS)', 'description' => 'Develop iOS mobile applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mobile Developer (Android)', 'description' => 'Develop Android mobile applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'React Native Developer', 'description' => 'Build cross-platform mobile apps', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Flutter Developer', 'description' => 'Develop cross-platform apps using Flutter', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Game Developer', 'description' => 'Develop video games for various platforms', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Embedded Systems Engineer', 'description' => 'Develop embedded software and firmware', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Site Reliability Engineer', 'description' => 'Ensure system reliability and performance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'IT Support Specialist', 'description' => 'Provide technical support to users', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Help Desk Technician', 'description' => 'Resolve IT issues and tickets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Data & Analytics ==========
            ['name' => 'Data Scientist', 'description' => 'Analyze complex data and build predictive models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Data Analyst', 'description' => 'Interpret data and generate insights', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business Analyst', 'description' => 'Bridge business needs with technical solutions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Data Engineer', 'description' => 'Build and maintain data pipelines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Machine Learning Engineer', 'description' => 'Develop and deploy ML models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'AI Specialist', 'description' => 'Work on artificial intelligence solutions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business Intelligence Analyst', 'description' => 'Create reports and dashboards for decision making', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Data Warehouse Architect', 'description' => 'Design and maintain data warehouses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Big Data Engineer', 'description' => 'Work with big data technologies like Hadoop, Spark', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Quantitative Analyst', 'description' => 'Apply mathematical models to financial data', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Design & Creative ==========
            ['name' => 'UI/UX Designer', 'description' => 'Design user interfaces and experiences', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Graphic Designer', 'description' => 'Create visual concepts and designs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Web Designer', 'description' => 'Design websites and web interfaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Product Designer', 'description' => 'Design product experiences and interfaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Motion Graphics Designer', 'description' => 'Create animated graphics and videos', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Video Editor', 'description' => 'Edit and produce video content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Art Director', 'description' => 'Lead creative direction and visual strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Illustrator', 'description' => 'Create illustrations for various media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Animator', 'description' => 'Create 2D or 3D animations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => '3D Modeler', 'description' => 'Create 3D models for games or films', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Creative Director', 'description' => 'Lead overall creative vision', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Copywriter', 'description' => 'Write compelling copy for marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Brand Designer', 'description' => 'Develop brand identities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Digital Marketing ==========
            ['name' => 'Digital Marketing Manager', 'description' => 'Manage digital marketing strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'SEO Specialist', 'description' => 'Optimize websites for search engines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Social Media Manager', 'description' => 'Manage social media presence and engagement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Content Writer', 'description' => 'Create engaging content for various platforms', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PPC Specialist', 'description' => 'Manage pay-per-click advertising campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Email Marketing Specialist', 'description' => 'Manage email marketing campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Marketing Analyst', 'description' => 'Analyze marketing data and ROI', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Brand Manager', 'description' => 'Manage brand strategy and positioning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Affiliate Marketing Manager', 'description' => 'Manage affiliate marketing programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Influencer Marketing Specialist', 'description' => 'Manage influencer partnerships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Marketing Automation Specialist', 'description' => 'Implement marketing automation tools', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Growth Hacker', 'description' => 'Drive rapid business growth through experiments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'CMO', 'description' => 'Chief Marketing Officer - Lead marketing strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Sales & Business Development ==========
            ['name' => 'Sales Executive', 'description' => 'Generate leads and close sales', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business Development Manager', 'description' => 'Identify and develop business opportunities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Account Manager', 'description' => 'Manage client accounts and relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sales Manager', 'description' => 'Lead sales team and achieve targets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Regional Sales Manager', 'description' => 'Manage sales operations in a region', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Key Account Manager', 'description' => 'Manage key strategic accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Inside Sales Representative', 'description' => 'Handle sales via phone and email', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sales Director', 'description' => 'Lead overall sales strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sales Development Representative', 'description' => 'Qualify leads and set appointments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Channel Sales Manager', 'description' => 'Manage partner and channel sales', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pre-Sales Consultant', 'description' => 'Support sales with technical expertise', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'VP of Sales', 'description' => 'Lead global sales operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Human Resources ==========
            ['name' => 'HR Executive', 'description' => 'Handle HR operations and recruitment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'HR Manager', 'description' => 'Manage HR department and policies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Recruitment Specialist', 'description' => 'Source and hire talented candidates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Talent Acquisition Manager', 'description' => 'Lead talent acquisition strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Payroll Specialist', 'description' => 'Manage payroll processing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Training & Development Manager', 'description' => 'Manage employee training programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Performance Management Specialist', 'description' => 'Manage performance review systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'HRBP', 'description' => 'HR Business Partner - Align HR with business goals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Compensation & Benefits Manager', 'description' => 'Design compensation and benefits programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Employee Relations Manager', 'description' => 'Manage employee relations and conflicts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'HRIS Specialist', 'description' => 'Manage HR information systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'CHRO', 'description' => 'Chief Human Resources Officer - Lead HR strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Finance & Accounting ==========
            ['name' => 'Accountant', 'description' => 'Manage financial records and transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Senior Accountant', 'description' => 'Handle complex accounting tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Financial Analyst', 'description' => 'Analyze financial data and trends', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Finance Manager', 'description' => 'Manage finance department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tax Consultant', 'description' => 'Provide tax planning and compliance services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Auditor', 'description' => 'Conduct financial audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'CFO', 'description' => 'Chief Financial Officer - Lead financial strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Credit Analyst', 'description' => 'Evaluate creditworthiness of clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Investment Analyst', 'description' => 'Analyze investment opportunities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Treasury Manager', 'description' => 'Manage company treasury and cash flow', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Risk Manager', 'description' => 'Identify and mitigate financial risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bookkeeper', 'description' => 'Maintain financial records', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Payroll Accountant', 'description' => 'Process payroll and related taxes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Controller', 'description' => 'Oversee accounting operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Operations & Project Management ==========
            ['name' => 'Project Manager', 'description' => 'Lead and manage projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Product Manager', 'description' => 'Manage product lifecycle and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Operations Manager', 'description' => 'Manage daily operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Program Manager', 'description' => 'Manage multiple related projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Scrum Master', 'description' => 'Facilitate agile development processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Delivery Manager', 'description' => 'Ensure project delivery and client satisfaction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Operations Executive', 'description' => 'Support operational activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Product Owner', 'description' => 'Define product requirements and priorities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Portfolio Manager', 'description' => 'Manage project portfolio', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PMO Manager', 'description' => 'Lead Project Management Office', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business Operations Manager', 'description' => 'Optimize business processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'COO', 'description' => 'Chief Operating Officer - Lead operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Customer Support ==========
            ['name' => 'Customer Support Executive', 'description' => 'Handle customer queries and issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Customer Service Manager', 'description' => 'Manage customer service team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Technical Support Engineer', 'description' => 'Provide technical assistance to customers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Customer Success Manager', 'description' => 'Ensure customer satisfaction and retention', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Call Center Representative', 'description' => 'Handle inbound/outbound calls', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Customer Experience Manager', 'description' => 'Improve overall customer experience', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Help Desk Analyst', 'description' => 'Resolve customer technical issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Client Relationship Manager', 'description' => 'Manage client relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Healthcare ==========
            ['name' => 'Doctor', 'description' => 'Provide medical care and treatment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nurse', 'description' => 'Provide patient care and support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pharmacist', 'description' => 'Dispense medications and advise patients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Medical Transcriptionist', 'description' => 'Transcribe medical records', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Healthcare Administrator', 'description' => 'Manage healthcare facility operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lab Technician', 'description' => 'Conduct medical laboratory tests', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Physiotherapist', 'description' => 'Provide physical therapy treatment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Radiologist', 'description' => 'Interpret medical images', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Surgeon', 'description' => 'Perform surgical procedures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Anesthesiologist', 'description' => 'Administer anesthesia during procedures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dentist', 'description' => 'Provide dental care', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Veterinarian', 'description' => 'Provide animal healthcare', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Psychologist', 'description' => 'Provide mental health services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Medical Coder', 'description' => 'Code medical diagnoses and procedures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Clinical Research Coordinator', 'description' => 'Manage clinical trials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Education & Teaching ==========
            ['name' => 'Teacher', 'description' => 'Educate students in school setting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Professor', 'description' => 'Teach at college/university level', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Online Tutor', 'description' => 'Provide online teaching services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Academic Counselor', 'description' => 'Guide students in academic matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Curriculum Developer', 'description' => 'Develop educational curriculum', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Principal', 'description' => 'Lead educational institution', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Instructional Designer', 'description' => 'Design learning experiences', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Librarian', 'description' => 'Manage library resources', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Special Education Teacher', 'description' => 'Teach students with special needs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dean', 'description' => 'Lead academic department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Education Consultant', 'description' => 'Advise on educational programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'E-learning Developer', 'description' => 'Create digital learning content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Banking & Insurance ==========
            ['name' => 'Bank Teller', 'description' => 'Handle customer banking transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Relationship Manager', 'description' => 'Manage banking relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Loan Officer', 'description' => 'Process loan applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Insurance Agent', 'description' => 'Sell insurance policies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Wealth Manager', 'description' => 'Manage investment portfolios', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Branch Manager', 'description' => 'Manage bank branch operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Investment Banker', 'description' => 'Facilitate capital raising and M&A', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Credit Risk Analyst', 'description' => 'Assess credit risk', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Compliance Officer', 'description' => 'Ensure regulatory compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Financial Advisor', 'description' => 'Provide financial planning advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mortgage Broker', 'description' => 'Facilitate mortgage loans', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Underwriter', 'description' => 'Evaluate insurance risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Legal ==========
            ['name' => 'Lawyer', 'description' => 'Provide legal advice and representation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Legal Advisor', 'description' => 'Provide legal guidance to organizations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Paralegal', 'description' => 'Support legal professionals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Corporate Lawyer', 'description' => 'Handle corporate legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Criminal Lawyer', 'description' => 'Handle criminal cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Family Lawyer', 'description' => 'Handle family law matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Intellectual Property Lawyer', 'description' => 'Protect intellectual property', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Legal Secretary', 'description' => 'Support legal team administratively', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Judge', 'description' => 'Preside over court proceedings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Real Estate & Construction ==========
            ['name' => 'Real Estate Agent', 'description' => 'Facilitate property transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Civil Engineer', 'description' => 'Design and oversee construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Architect', 'description' => 'Design buildings and structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Site Supervisor', 'description' => 'Supervise construction sites', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Interior Designer', 'description' => 'Design interior spaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Quantity Surveyor', 'description' => 'Manage construction costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Property Manager', 'description' => 'Manage real estate properties', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Construction Manager', 'description' => 'Oversee construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Building Inspector', 'description' => 'Inspect building compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Land Surveyor', 'description' => 'Measure land boundaries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Urban Planner', 'description' => 'Plan land use and development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Manufacturing ==========
            ['name' => 'Production Manager', 'description' => 'Manage manufacturing production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Quality Control Inspector', 'description' => 'Ensure product quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Maintenance Engineer', 'description' => 'Maintain manufacturing equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Supply Chain Manager', 'description' => 'Manage supply chain operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Logistics Coordinator', 'description' => 'Coordinate logistics activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Warehouse Manager', 'description' => 'Manage warehouse operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Process Engineer', 'description' => 'Optimize manufacturing processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Industrial Engineer', 'description' => 'Improve efficiency in production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Plant Manager', 'description' => 'Lead manufacturing plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Machine Operator', 'description' => 'Operate manufacturing machinery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Assembly Line Worker', 'description' => 'Assemble products on production line', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Hospitality ==========
            ['name' => 'Hotel Manager', 'description' => 'Manage hotel operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Chef', 'description' => 'Prepare and manage kitchen operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Restaurant Manager', 'description' => 'Manage restaurant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Front Office Manager', 'description' => 'Manage front desk operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Housekeeping Supervisor', 'description' => 'Supervise housekeeping staff', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Event Planner', 'description' => 'Plan and coordinate events', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bartender', 'description' => 'Prepare and serve beverages', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Waiter/Waitress', 'description' => 'Serve food and beverages', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Concierge', 'description' => 'Assist hotel guests', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sommelier', 'description' => 'Manage wine selection and service', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Travel Agent', 'description' => 'Plan and book travel arrangements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tour Guide', 'description' => 'Lead tourist tours', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Logistics & Transportation ==========
            ['name' => 'Driver', 'description' => 'Operate vehicles for transport', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Delivery Boy', 'description' => 'Deliver packages to customers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fleet Manager', 'description' => 'Manage vehicle fleet', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Logistics Manager', 'description' => 'Manage logistics operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Supply Chain Coordinator', 'description' => 'Coordinate supply chain activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Truck Driver', 'description' => 'Transport goods via trucks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Warehouse Associate', 'description' => 'Handle warehouse tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dispatcher', 'description' => 'Coordinate vehicle dispatch', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Customs Broker', 'description' => 'Handle customs clearance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Retail ==========
            ['name' => 'Store Manager', 'description' => 'Manage retail store operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sales Associate', 'description' => 'Assist customers in retail setting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cashier', 'description' => 'Process customer payments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Visual Merchandiser', 'description' => 'Design store displays', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Inventory Manager', 'description' => 'Manage inventory levels', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Buyer', 'description' => 'Purchase merchandise for retail', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Regional Manager', 'description' => 'Manage multiple store locations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'E-commerce Manager', 'description' => 'Manage online retail operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Media & Entertainment ==========
            ['name' => 'Journalist', 'description' => 'Report news stories', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'News Anchor', 'description' => 'Present news on television', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Photographer', 'description' => 'Capture photographs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Actor', 'description' => 'Perform in films or television', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Singer', 'description' => 'Perform vocal music', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Music Composer', 'description' => 'Create musical compositions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Film Director', 'description' => 'Direct films and productions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Producer', 'description' => 'Manage film or TV production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Screenwriter', 'description' => 'Write scripts for films/TV', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Radio Jockey', 'description' => 'Host radio shows', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Content Creator', 'description' => 'Create content for social media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'YouTuber', 'description' => 'Create video content for YouTube', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Agriculture ==========
            ['name' => 'Farm Manager', 'description' => 'Manage farm operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Agricultural Officer', 'description' => 'Provide agricultural guidance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Agronomist', 'description' => 'Study crop production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Horticulturist', 'description' => 'Cultivate fruits and vegetables', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Veterinary Doctor', 'description' => 'Treat farm animals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Soil Scientist', 'description' => 'Study soil properties', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Agricultural Engineer', 'description' => 'Design farm equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Freelance & Gig Economy ==========
            ['name' => 'Freelancer', 'description' => 'Work independently on projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Virtual Assistant', 'description' => 'Provide administrative support remotely', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Consultant', 'description' => 'Provide expert advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Social Media Influencer', 'description' => 'Promote products on social media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Podcaster', 'description' => 'Host and produce podcasts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Online Coach', 'description' => 'Provide coaching online', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Entry Level ==========
            ['name' => 'Trainee', 'description' => 'Learn and assist in various tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Intern', 'description' => 'Gain practical experience', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fresher', 'description' => 'Entry-level position for new graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Apprentice', 'description' => 'Learn trade through hands-on experience', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Graduate Trainee', 'description' => 'Training program for fresh graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Management Trainee', 'description' => 'Rotational program for future managers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Executive Leadership ==========
            ['name' => 'CEO', 'description' => 'Chief Executive Officer - Lead overall company strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'President', 'description' => 'Lead company divisions or overall operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Managing Director', 'description' => 'Lead company operations and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Executive Director', 'description' => 'Lead specific business functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Board Member', 'description' => 'Serve on company board of directors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Non-Profit ==========
            ['name' => 'NGO Coordinator', 'description' => 'Coordinate NGO activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Social Worker', 'description' => 'Provide social services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fundraising Manager', 'description' => 'Manage fundraising activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Community Organizer', 'description' => 'Organize community programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Program Manager (NGO)', 'description' => 'Manage NGO programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Sports & Fitness ==========
            ['name' => 'Personal Trainer', 'description' => 'Provide fitness training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sports Coach', 'description' => 'Coach sports teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Yoga Instructor', 'description' => 'Teach yoga classes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Athlete', 'description' => 'Professional sports player', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gym Manager', 'description' => 'Manage fitness facility', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nutritionist', 'description' => 'Provide dietary advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Government ==========
            ['name' => 'Civil Servant', 'description' => 'Work in government service', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Police Officer', 'description' => 'Enforce laws and maintain order', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Firefighter', 'description' => 'Respond to fires and emergencies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Government Administrator', 'description' => 'Manage government programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Public Relations Officer', 'description' => 'Manage government communications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
        ['name' => 'Chief Financial Officer (CFO)', 'description' => 'Lead financial strategy, planning, and operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Director', 'description' => 'Oversee financial operations and reporting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Manager', 'description' => 'Manage financial planning and analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Deputy Finance Manager', 'description' => 'Assist in financial operations management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Executive', 'description' => 'Handle day-to-day financial transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Associate', 'description' => 'Support finance team operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Accounting Roles
['name' => 'Accountant', 'description' => 'Manage financial records and transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Accountant', 'description' => 'Handle complex accounting tasks and reconciliation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Accountant', 'description' => 'Assist in accounting operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounts Payable Specialist', 'description' => 'Manage vendor payments and invoices', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounts Receivable Specialist', 'description' => 'Manage customer collections and receipts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'General Ledger Accountant', 'description' => 'Maintain general ledger accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cost Accountant', 'description' => 'Analyze and manage product costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Management Accountant', 'description' => 'Provide internal financial reports', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chartered Accountant (CA)', 'description' => 'Professional accountant with CA certification', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Certified Public Accountant (CPA)', 'description' => 'Licensed professional accountant', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Company Secretary (CS)', 'description' => 'Ensure legal and regulatory compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Financial Planning & Analysis (FP&A)
['name' => 'Financial Analyst', 'description' => 'Analyze financial data and trends', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Financial Analyst', 'description' => 'Lead financial analysis and modeling', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'FP&A Manager', 'description' => 'Manage financial planning and analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Budget Analyst', 'description' => 'Prepare and monitor budgets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Controller', 'description' => 'Oversee financial reporting and controls', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Tax Roles
['name' => 'Tax Consultant', 'description' => 'Provide tax planning and advisory services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Manager', 'description' => 'Manage tax compliance and planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Analyst', 'description' => 'Prepare and file tax returns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'International Tax Specialist', 'description' => 'Handle cross-border tax matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Transfer Pricing Analyst', 'description' => 'Manage transfer pricing documentation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GST/VAT Specialist', 'description' => 'Manage indirect tax compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Director', 'description' => 'Lead tax strategy and compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Audit Roles
['name' => 'Internal Auditor', 'description' => 'Conduct internal audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'External Auditor', 'description' => 'Perform statutory audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Audit Manager', 'description' => 'Lead audit engagements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Auditor', 'description' => 'Conduct complex audit procedures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Internal Audit Head', 'description' => 'Lead internal audit function', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compliance Auditor', 'description' => 'Ensure regulatory compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Information Technology Auditor', 'description' => 'Audit IT systems and controls', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Treasury Roles
['name' => 'Treasury Manager', 'description' => 'Manage cash flow and treasury operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Treasury Analyst', 'description' => 'Analyze cash positions and investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cash Manager', 'description' => 'Manage daily cash operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Manager', 'description' => 'Identify and mitigate financial risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Credit Manager', 'description' => 'Manage credit and collections', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Investment & Banking Roles
['name' => 'Investment Banker', 'description' => 'Facilitate capital raising and M&A', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Investment Analyst', 'description' => 'Analyze investment opportunities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Portfolio Manager', 'description' => 'Manage investment portfolios', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Wealth Manager', 'description' => 'Advise high-net-worth clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Equity Research Analyst', 'description' => 'Research stocks and companies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Credit Analyst', 'description' => 'Evaluate creditworthiness', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Advisor', 'description' => 'Provide financial planning advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Private Equity Analyst', 'description' => 'Analyze private equity investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Venture Capital Analyst', 'description' => 'Evaluate startup investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hedge Fund Manager', 'description' => 'Manage hedge fund investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mutual Fund Manager', 'description' => 'Manage mutual fund portfolios', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Banking Roles (Retail & Corporate)
['name' => 'Relationship Manager - Corporate Banking', 'description' => 'Manage corporate client relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Relationship Manager - SME', 'description' => 'Manage small business clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Branch Manager - Banking', 'description' => 'Lead bank branch operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Loan Officer', 'description' => 'Process and approve loans', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Credit Officer', 'description' => 'Assess credit applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bank Teller', 'description' => 'Process customer transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trade Finance Specialist', 'description' => 'Handle trade finance operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Foreign Exchange Dealer', 'description' => 'Manage currency trading', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Insurance Roles
['name' => 'Underwriter', 'description' => 'Evaluate insurance risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Claims Adjuster', 'description' => 'Process insurance claims', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Actuary', 'description' => 'Analyze financial risks using mathematics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insurance Agent', 'description' => 'Sell insurance policies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Surveyor', 'description' => 'Assess risks for insurance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Payroll & Compensation
['name' => 'Payroll Specialist', 'description' => 'Process payroll and deductions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Payroll Manager', 'description' => 'Manage payroll operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compensation Analyst', 'description' => 'Analyze compensation structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Benefits Administrator', 'description' => 'Manage employee benefits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Real Estate Finance
['name' => 'Real Estate Finance Manager', 'description' => 'Manage real estate investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mortgage Specialist', 'description' => 'Process mortgage applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Property Valuer', 'description' => 'Assess property values', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Financial Services
['name' => 'Financial Services Representative', 'description' => 'Sell financial products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Customer Service Representative - Finance', 'description' => 'Assist finance customers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Operations Analyst - Finance', 'description' => 'Support finance operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Settlement Officer', 'description' => 'Process financial settlements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Compliance & Regulatory
['name' => 'Compliance Officer', 'description' => 'Ensure regulatory compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Anti-Money Laundering (AML) Analyst', 'description' => 'Detect and prevent money laundering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'KYC Analyst', 'description' => 'Verify customer identities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regulatory Reporting Analyst', 'description' => 'Prepare regulatory reports', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Compliance Officer', 'description' => 'Lead compliance function', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Fintech & Digital Finance
['name' => 'Fintech Analyst', 'description' => 'Analyze financial technology trends', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Blockchain Financial Analyst', 'description' => 'Analyze blockchain finance applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cryptocurrency Analyst', 'description' => 'Analyze crypto markets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Payments Specialist', 'description' => 'Manage digital payment systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level Finance
['name' => 'Finance Intern', 'description' => 'Learn finance operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounting Intern', 'description' => 'Support accounting team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Trainee', 'description' => 'Training program for finance graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounts Assistant', 'description' => 'Assist in accounting tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Fresher', 'description' => 'Entry-level finance position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounting Clerk', 'description' => 'Perform basic accounting tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Specialized Finance Roles
['name' => 'Mergers & Acquisitions Analyst', 'description' => 'Analyze M&A opportunities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Valuation Analyst', 'description' => 'Perform business valuations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Modeling Specialist', 'description' => 'Build complex financial models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Finance Analyst', 'description' => 'Finance large infrastructure projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Structured Finance Analyst', 'description' => 'Structure complex financial products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quantitative Analyst (Quant)', 'description' => 'Apply mathematical models to finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Derivatives Analyst', 'description' => 'Analyze derivative instruments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Finance Management Positions
['name' => 'VP of Finance', 'description' => 'Lead finance department as Vice President', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'AVP - Finance', 'description' => 'Assistant Vice President - Finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Business Partner', 'description' => 'Partner with business units on finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Commercial Finance Manager', 'description' => 'Manage commercial finance activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Executive Officer (CEO)', 'description' => 'Lead overall company strategy and operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Operating Officer (COO)', 'description' => 'Oversee daily operations and business functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Financial Officer (CFO)', 'description' => 'Lead financial strategy and planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Technology Officer (CTO)', 'description' => 'Lead technology strategy and innovation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Marketing Officer (CMO)', 'description' => 'Lead marketing and brand strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Human Resources Officer (CHRO)', 'description' => 'Lead HR strategy and people operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Information Officer (CIO)', 'description' => 'Lead information technology strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Data Officer (CDO)', 'description' => 'Lead data strategy and governance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Digital Officer', 'description' => 'Lead digital transformation initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Innovation Officer', 'description' => 'Drive innovation and new initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Sales Officer (CSO)', 'description' => 'Lead sales strategy and operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Product Officer (CPO)', 'description' => 'Lead product strategy and development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Strategy Officer', 'description' => 'Lead corporate strategy and planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Compliance Officer', 'description' => 'Lead regulatory compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Risk Officer (CRO)', 'description' => 'Lead risk management strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'President', 'description' => 'Lead company divisions or overall operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Managing Director', 'description' => 'Lead company operations and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Executive Director', 'description' => 'Lead specific business functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Senior Management
['name' => 'Vice President (VP) of Operations', 'description' => 'Lead operational excellence and efficiency', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice President (VP) of Sales', 'description' => 'Lead sales organization and revenue growth', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice President (VP) of Marketing', 'description' => 'Lead marketing strategy and execution', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice President (VP) of Engineering', 'description' => 'Lead engineering and technical teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice President (VP) of Product', 'description' => 'Lead product management and development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice President (VP) of Finance', 'description' => 'Lead finance department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice President (VP) of Human Resources', 'description' => 'Lead HR department and strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice President (VP) of Customer Success', 'description' => 'Lead customer retention and satisfaction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice President (VP) of Business Development', 'description' => 'Lead strategic partnerships and growth', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Vice President (SVP)', 'description' => 'Senior leadership role overseeing multiple functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Vice President (AVP)', 'description' => 'Support VP in department leadership', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// General Management
['name' => 'General Manager', 'description' => 'Oversee business unit or location operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Deputy General Manager', 'description' => 'Assist General Manager in operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant General Manager', 'description' => 'Support General Manager in daily operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Manager', 'description' => 'Manage operations in a specific region', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Director', 'description' => 'Lead regional strategy and operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Area Manager', 'description' => 'Manage multiple locations in an area', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Country Manager', 'description' => 'Lead operations in a specific country', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plant Manager', 'description' => 'Lead manufacturing plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Factory Manager', 'description' => 'Manage factory operations and production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Branch Manager', 'description' => 'Lead branch office operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Store Manager', 'description' => 'Manage retail store operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cluster Manager', 'description' => 'Manage multiple stores in a cluster', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Operations Management
['name' => 'Operations Manager', 'description' => 'Manage daily operational activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Operations Manager', 'description' => 'Lead complex operational functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Supply Chain Manager', 'description' => 'Manage supply chain and logistics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Logistics Manager', 'description' => 'Oversee logistics operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Warehouse Manager', 'description' => 'Manage warehouse and inventory', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Manager', 'description' => 'Lead production and manufacturing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Manager', 'description' => 'Manage quality assurance programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Facility Manager', 'description' => 'Manage facility operations and maintenance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Service Delivery Manager', 'description' => 'Ensure service delivery quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fleet Manager', 'description' => 'Manage vehicle fleet operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Maintenance Manager', 'description' => 'Lead maintenance operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Project & Program Management
['name' => 'Project Manager', 'description' => 'Lead and manage projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Project Manager', 'description' => 'Lead complex, high-value projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Program Manager', 'description' => 'Manage multiple related projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Portfolio Manager', 'description' => 'Manage project portfolio', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PMO Manager', 'description' => 'Lead Project Management Office', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Delivery Manager', 'description' => 'Ensure project delivery and client satisfaction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Scrum Master', 'description' => 'Facilitate agile development processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Agile Coach', 'description' => 'Coach teams on agile methodologies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Technical Project Manager', 'description' => 'Lead technical project delivery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Project Manager', 'description' => 'Manage construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IT Project Manager', 'description' => 'Lead IT and software projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Product Management
['name' => 'Product Manager', 'description' => 'Manage product lifecycle and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Product Manager', 'description' => 'Lead complex product initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Owner', 'description' => 'Define product requirements and priorities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Associate Product Manager', 'description' => 'Support product management team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Technical Product Manager', 'description' => 'Lead technical product development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Platform Product Manager', 'description' => 'Manage platform products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'AI Product Manager', 'description' => 'Lead AI/ML product development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Product Manager', 'description' => 'Lead digital product initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Human Resources Management
['name' => 'HR Manager', 'description' => 'Manage HR department and policies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior HR Manager', 'description' => 'Lead complex HR functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Talent Acquisition Manager', 'description' => 'Lead recruitment and talent sourcing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Learning & Development Manager', 'description' => 'Lead training and development programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compensation & Benefits Manager', 'description' => 'Design compensation and benefits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Performance Management Manager', 'description' => 'Lead performance review systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Employee Relations Manager', 'description' => 'Manage employee relations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HR Business Partner (HRBP)', 'description' => 'Align HR with business goals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior HRBP', 'description' => 'Lead HR partnership for business units', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Payroll Manager', 'description' => 'Manage payroll operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HR Operations Manager', 'description' => 'Lead HR operational efficiency', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Sales Management
['name' => 'Sales Manager', 'description' => 'Lead sales team and achieve targets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Sales Manager', 'description' => 'Lead multiple sales teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Sales Manager', 'description' => 'Manage sales operations in a region', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'National Sales Manager', 'description' => 'Lead national sales strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Area Sales Manager', 'description' => 'Manage sales in specific area', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Key Account Manager', 'description' => 'Manage key strategic accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Key Account Manager', 'description' => 'Lead key account strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Channel Sales Manager', 'description' => 'Manage partner and channel sales', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inside Sales Manager', 'description' => 'Lead inside sales team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Development Manager', 'description' => 'Identify and develop business opportunities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Business Development Manager', 'description' => 'Lead strategic business development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sales Director', 'description' => 'Lead overall sales strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Marketing Management
['name' => 'Marketing Manager', 'description' => 'Lead marketing strategy and execution', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Marketing Manager', 'description' => 'Lead complex marketing initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Brand Manager', 'description' => 'Manage brand strategy and positioning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Marketing Manager', 'description' => 'Lead digital marketing strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Media Manager', 'description' => 'Manage social media presence', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Content Marketing Manager', 'description' => 'Lead content strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Marketing Manager', 'description' => 'Lead product marketing initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Performance Marketing Manager', 'description' => 'Lead performance marketing campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SEO Manager', 'description' => 'Lead SEO strategy and execution', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Email Marketing Manager', 'description' => 'Lead email marketing programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Director', 'description' => 'Lead marketing department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Finance Management
['name' => 'Finance Manager', 'description' => 'Manage financial planning and analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Finance Manager', 'description' => 'Lead complex financial functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Planning & Analysis Manager', 'description' => 'Lead FP&A activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Treasury Manager', 'description' => 'Manage cash flow and treasury', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Manager', 'description' => 'Manage tax compliance and planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Audit Manager', 'description' => 'Lead audit engagements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Internal Audit Manager', 'description' => 'Lead internal audit function', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Credit Manager', 'description' => 'Manage credit and collections', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Manager', 'description' => 'Lead risk management programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Investment Manager', 'description' => 'Manage investment portfolios', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Controller', 'description' => 'Oversee financial reporting and controls', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Technology Management
['name' => 'IT Manager', 'description' => 'Manage IT operations and infrastructure', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior IT Manager', 'description' => 'Lead IT strategy and operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Engineering Manager', 'description' => 'Lead engineering teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Software Development Manager', 'description' => 'Lead software development teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Technical Manager', 'description' => 'Lead technical teams and solutions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'DevOps Manager', 'description' => 'Lead DevOps practices and teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cloud Manager', 'description' => 'Manage cloud infrastructure', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Security Manager', 'description' => 'Lead information security programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Data Manager', 'description' => 'Manage data operations and governance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Database Manager', 'description' => 'Lead database administration', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Infrastructure Manager', 'description' => 'Manage IT infrastructure', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Network Manager', 'description' => 'Lead network operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Technical Lead', 'description' => 'Lead technical teams and architecture', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Customer Success Management
['name' => 'Customer Success Manager', 'description' => 'Ensure customer satisfaction and retention', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Customer Success Manager', 'description' => 'Lead strategic customer relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Customer Support Manager', 'description' => 'Lead customer support team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Customer Experience Manager', 'description' => 'Improve overall customer experience', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Client Services Manager', 'description' => 'Manage client service delivery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Technical Support Manager', 'description' => 'Lead technical support teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Quality & Process Management
['name' => 'Quality Assurance Manager', 'description' => 'Lead QA processes and teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Control Manager', 'description' => 'Manage quality control operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Excellence Manager', 'description' => 'Lead process improvement initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Six Sigma Manager', 'description' => 'Lead Six Sigma programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lean Manager', 'description' => 'Lead lean manufacturing initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Excellence Manager', 'description' => 'Drive business excellence', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Continuous Improvement Manager', 'description' => 'Lead continuous improvement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Supply Chain & Procurement Management
['name' => 'Supply Chain Manager', 'description' => 'Manage end-to-end supply chain', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Procurement Manager', 'description' => 'Lead procurement operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sourcing Manager', 'description' => 'Manage strategic sourcing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vendor Management Manager', 'description' => 'Manage vendor relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inventory Manager', 'description' => 'Manage inventory levels', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Demand Planning Manager', 'description' => 'Lead demand forecasting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Hospitality Management
['name' => 'Hotel Manager', 'description' => 'Manage hotel operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Restaurant Manager', 'description' => 'Manage restaurant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Food & Beverage Manager', 'description' => 'Lead F&B operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Front Office Manager', 'description' => 'Manage front desk operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Housekeeping Manager', 'description' => 'Lead housekeeping operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Banquet Manager', 'description' => 'Manage banquet and events', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Resort Manager', 'description' => 'Manage resort operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Spa Manager', 'description' => 'Manage spa operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Healthcare Management
['name' => 'Hospital Administrator', 'description' => 'Manage hospital operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinic Manager', 'description' => 'Manage clinic operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Healthcare Operations Manager', 'description' => 'Lead healthcare operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nursing Manager', 'description' => 'Lead nursing staff', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Practice Manager', 'description' => 'Manage medical practice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pharmacy Manager', 'description' => 'Manage pharmacy operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Health Services Manager', 'description' => 'Lead health services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Education Management
['name' => 'School Principal', 'description' => 'Lead school operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice Principal', 'description' => 'Support school leadership', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Academic Dean', 'description' => 'Lead academic programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'College Dean', 'description' => 'Lead college department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'University Registrar', 'description' => 'Manage academic records', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Training Manager', 'description' => 'Lead training programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Education Program Manager', 'description' => 'Manage education programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Construction & Real Estate Management
['name' => 'Construction Manager', 'description' => 'Manage construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Manager', 'description' => 'Manage construction site', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Manager - Construction', 'description' => 'Lead construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Real Estate Manager', 'description' => 'Manage real estate portfolio', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Property Manager', 'description' => 'Manage property operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Facilities Manager', 'description' => 'Manage facilities operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Non-Profit Management
['name' => 'Non-Profit Executive Director', 'description' => 'Lead non-profit organization', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Program Manager - NGO', 'description' => 'Manage NGO programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fundraising Manager', 'description' => 'Lead fundraising activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Community Outreach Manager', 'description' => 'Lead community programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Development Manager', 'description' => 'Lead development initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Sports & Entertainment Management
['name' => 'Sports Manager', 'description' => 'Manage sports operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Team Manager', 'description' => 'Manage sports team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Venue Manager', 'description' => 'Manage venue operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Event Manager', 'description' => 'Plan and manage events', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Entertainment Manager', 'description' => 'Manage entertainment operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Talent Manager', 'description' => 'Manage talent and artists', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level Management
['name' => 'Management Trainee', 'description' => 'Rotational program for future managers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Manager', 'description' => 'Support department management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Deputy Manager', 'description' => 'Support senior management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Team Lead', 'description' => 'Lead small team operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Supervisor', 'description' => 'Supervise daily operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shift Manager', 'description' => 'Manage shift operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Section Manager', 'description' => 'Lead department section', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Unit Manager', 'description' => 'Manage business unit', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Coordinator', 'description' => 'Coordinate team activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Consulting Management
['name' => 'Management Consultant', 'description' => 'Provide management advisory services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Management Consultant', 'description' => 'Lead consulting engagements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Strategy Consultant', 'description' => 'Advise on business strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Change Management Consultant', 'description' => 'Lead organizational change', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Operations Consultant', 'description' => 'Improve operational efficiency', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Transformation Manager', 'description' => 'Lead business transformation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Management Trainee (MBA)', 'description' => 'Entry-level management program for MBA graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'General Manager', 'description' => 'Oversee overall business operations and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Deputy General Manager', 'description' => 'Support GM in strategic decision making', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant General Manager', 'description' => 'Assist in managing business unit operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Unit Head', 'description' => 'Lead specific business unit P&L', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Division Manager', 'description' => 'Manage division operations and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Marketing
['name' => 'Marketing Manager (MBA)', 'description' => 'Lead marketing strategy and campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Brand Manager (MBA)', 'description' => 'Manage brand strategy and positioning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Marketing Manager', 'description' => 'Lead product marketing and go-to-market strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Marketing Manager', 'description' => 'Lead digital marketing strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Category Manager', 'description' => 'Manage product category P&L and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Marketing Manager', 'description' => 'Lead multiple marketing functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Director (MBA)', 'description' => 'Lead marketing department and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Customer Insights Manager', 'description' => 'Analyze customer behavior and market trends', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Market Research Manager', 'description' => 'Lead market research initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Marketing Officer (CMO)', 'description' => 'Lead overall marketing strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Finance
['name' => 'Finance Manager (MBA)', 'description' => 'Lead financial planning and analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Finance Manager', 'description' => 'Lead complex financial operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Planning & Analysis Manager', 'description' => 'Lead FP&A and budgeting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Investment Banking Associate', 'description' => 'MBA role in investment banking', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Private Equity Associate', 'description' => 'Analyze and manage PE investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Venture Capital Associate', 'description' => 'Evaluate startup investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Finance Manager', 'description' => 'Manage corporate finance activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Treasury Manager (MBA)', 'description' => 'Lead treasury and cash management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Manager (MBA)', 'description' => 'Lead risk management programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mergers & Acquisitions Manager', 'description' => 'Lead M&A transactions and integration', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Financial Officer (CFO)', 'description' => 'Lead financial strategy (MBA preferred)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Controller (MBA)', 'description' => 'Oversee financial reporting and controls', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Human Resources
['name' => 'HR Manager (MBA)', 'description' => 'Lead HR operations and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior HR Manager', 'description' => 'Lead strategic HR initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Talent Acquisition Manager (MBA)', 'description' => 'Lead recruitment and talent sourcing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Learning & Development Manager', 'description' => 'Lead training and development programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compensation & Benefits Manager', 'description' => 'Design C&B programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HR Business Partner (MBA)', 'description' => 'Strategic HR partnership with business', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior HRBP', 'description' => 'Lead HR business partnership', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Organizational Development Manager', 'description' => 'Lead OD initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Human Resources Officer (CHRO)', 'description' => 'Lead HR strategy (MBA preferred)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HR Director (MBA)', 'description' => 'Lead HR department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Operations & Supply Chain
['name' => 'Operations Manager (MBA)', 'description' => 'Lead operations and process improvement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Supply Chain Manager (MBA)', 'description' => 'Lead end-to-end supply chain', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Logistics Manager (MBA)', 'description' => 'Manage logistics operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Procurement Manager (MBA)', 'description' => 'Lead strategic procurement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sourcing Manager (MBA)', 'description' => 'Manage strategic sourcing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inventory Manager (MBA)', 'description' => 'Lead inventory optimization', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Demand Planning Manager', 'description' => 'Lead demand forecasting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Manager (MBA)', 'description' => 'Lead manufacturing operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plant Manager (MBA)', 'description' => 'Lead plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Operating Officer (COO)', 'description' => 'Lead operations strategy (MBA preferred)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in International Business
['name' => 'International Business Manager', 'description' => 'Lead international operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Global Business Manager', 'description' => 'Manage global business initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Export/Import Manager', 'description' => 'Lead export-import operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Country Manager (MBA)', 'description' => 'Lead country operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Manager (MBA)', 'description' => 'Lead regional operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Global Supply Chain Manager', 'description' => 'Lead global supply chain', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'International Marketing Manager', 'description' => 'Lead international marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Sales & Business Development
['name' => 'Sales Manager (MBA)', 'description' => 'Lead sales team and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Development Manager (MBA)', 'description' => 'Identify and develop business opportunities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Business Development Manager', 'description' => 'Lead strategic BD initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Sales Manager (MBA)', 'description' => 'Lead regional sales operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'National Sales Manager', 'description' => 'Lead national sales strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Key Account Manager (MBA)', 'description' => 'Manage strategic accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Channel Sales Manager (MBA)', 'description' => 'Manage partner and channel sales', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sales Director (MBA)', 'description' => 'Lead overall sales strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Strategy & Consulting
['name' => 'Strategy Manager (MBA)', 'description' => 'Lead corporate strategy initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Management Consultant (MBA)', 'description' => 'Provide strategic advisory services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Consultant (MBA)', 'description' => 'Lead consulting engagements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Strategy Consultant (MBA)', 'description' => 'Advise on business strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Strategy Manager', 'description' => 'Lead corporate strategy development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Strategy Officer (CSO)', 'description' => 'Lead corporate strategy (MBA preferred)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Strategy Manager', 'description' => 'Lead business strategy formulation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Strategic Planning Manager', 'description' => 'Lead strategic planning process', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Entrepreneurship
['name' => 'Entrepreneur in Residence', 'description' => 'Develop new business ventures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Innovation Manager (MBA)', 'description' => 'Lead innovation initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Startup Founder/Co-founder', 'description' => 'Start and lead new venture', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Incubation Manager', 'description' => 'Lead business incubation programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Venture Development Manager', 'description' => 'Develop venture opportunities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in IT & Systems
['name' => 'IT Manager (MBA)', 'description' => 'Lead IT strategy and operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IT Project Manager (MBA)', 'description' => 'Lead IT projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Transformation Manager', 'description' => 'Lead digital transformation initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Manager (Tech MBA)', 'description' => 'Lead technology product management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Information Officer (CIO)', 'description' => 'Lead IT strategy (MBA preferred)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Technology Officer (CTO)', 'description' => 'Lead technology strategy (MBA preferred)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ERP Manager (MBA)', 'description' => 'Lead ERP implementation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Healthcare Management
['name' => 'Hospital Administrator (MBA)', 'description' => 'Lead hospital operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Healthcare Manager (MBA)', 'description' => 'Manage healthcare facilities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pharmaceutical Product Manager', 'description' => 'Lead pharma product management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Healthcare Operations Manager', 'description' => 'Lead healthcare operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Practice Manager', 'description' => 'Manage medical practice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Healthcare Consultant (MBA)', 'description' => 'Provide healthcare advisory', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Retail Management
['name' => 'Retail Manager (MBA)', 'description' => 'Lead retail operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Store Manager (MBA)', 'description' => 'Manage retail store operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Category Manager - Retail', 'description' => 'Manage product categories', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Visual Merchandising Manager', 'description' => 'Lead visual merchandising strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'E-commerce Manager (MBA)', 'description' => 'Lead e-commerce operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Retail Manager', 'description' => 'Lead regional retail operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Banking & Financial Services
['name' => 'Relationship Manager - Corporate Banking (MBA)', 'description' => 'Manage corporate client relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Branch Manager - Banking (MBA)', 'description' => 'Lead bank branch operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Wealth Manager (MBA)', 'description' => 'Manage HNI client portfolios', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Credit Manager (MBA)', 'description' => 'Lead credit assessment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Portfolio Manager (MBA)', 'description' => 'Manage investment portfolios', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Investment Advisor (MBA)', 'description' => 'Provide investment advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Hospitality Management
['name' => 'Hotel Manager (MBA)', 'description' => 'Lead hotel operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Resort Manager (MBA)', 'description' => 'Lead resort operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Restaurant Manager (MBA)', 'description' => 'Lead restaurant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Food & Beverage Manager (MBA)', 'description' => 'Lead F&B operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Revenue Manager (MBA)', 'description' => 'Lead revenue management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Project Management
['name' => 'Project Manager (MBA)', 'description' => 'Lead complex projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Program Manager (MBA)', 'description' => 'Manage multiple related projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Portfolio Manager (MBA)', 'description' => 'Manage project portfolio', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PMO Manager (MBA)', 'description' => 'Lead Project Management Office', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Delivery Manager (MBA)', 'description' => 'Ensure project delivery excellence', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Real Estate Management
['name' => 'Real Estate Manager (MBA)', 'description' => 'Manage real estate portfolio', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Property Manager (MBA)', 'description' => 'Lead property operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Real Estate Development Manager', 'description' => 'Lead real estate development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Real Estate Investment Manager', 'description' => 'Manage real estate investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Sustainability & CSR
['name' => 'Sustainability Manager (MBA)', 'description' => 'Lead sustainability initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CSR Manager (MBA)', 'description' => 'Lead corporate social responsibility', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Environmental Manager (MBA)', 'description' => 'Lead environmental programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ESG Manager (MBA)', 'description' => 'Lead ESG initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Media & Entertainment
['name' => 'Media Manager (MBA)', 'description' => 'Lead media operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Entertainment Manager (MBA)', 'description' => 'Lead entertainment business', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sports Manager (MBA)', 'description' => 'Lead sports organization', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Event Manager (MBA)', 'description' => 'Lead event management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// MBA in Agri-Business
['name' => 'Agri-Business Manager (MBA)', 'description' => 'Lead agri-business operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Farm Manager (MBA)', 'description' => 'Manage large farm operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Agricultural Supply Chain Manager', 'description' => 'Lead agricultural supply chain', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Executive MBA Positions
['name' => 'Executive Director (MBA)', 'description' => 'Executive leadership position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Head (MBA)', 'description' => 'Lead entire business unit', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'VP of Business Development (MBA)', 'description' => 'Lead BD strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'VP of Operations (MBA)', 'description' => 'Lead operations strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'VP of Sales (MBA)', 'description' => 'Lead sales organization', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'VP of Marketing (MBA)', 'description' => 'Lead marketing department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level MBA Positions
['name' => 'MBA Intern', 'description' => 'Internship for MBA students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'MBA Graduate Trainee', 'description' => 'Management trainee program for MBA graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Associate (MBA)', 'description' => 'Entry-level management role', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Manager (MBA)', 'description' => 'Junior management position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Manager (MBA)', 'description' => 'Assistant management role', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Leadership Development Programs
['name' => 'Leadership Development Program (LDP)', 'description' => 'Rotational program for MBA graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Management Associate (MBA)', 'description' => 'Management trainee program', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Future Leader Program Participant', 'description' => 'High-potential MBA program', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accelerated Management Program', 'description' => 'Fast-track management program for MBAs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Additional Specialized MBA Roles
['name' => 'Change Management Manager (MBA)', 'description' => 'Lead organizational change', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Transformation Manager (MBA)', 'description' => 'Lead business transformation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Excellence Manager (MBA)', 'description' => 'Drive business excellence', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Improvement Manager (MBA)', 'description' => 'Lead process improvement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Data Analytics Manager (MBA)', 'description' => 'Lead data analytics team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Intelligence Manager (MBA)', 'description' => 'Lead BI strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Executive Officer (CEO)', 'description' => 'Top executive leadership (MBA preferred)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Digital Officer (MBA)', 'description' => 'Lead digital strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Innovation Officer (MBA)', 'description' => 'Lead innovation strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Data Officer (MBA)', 'description' => 'Lead data strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// Medical Doctors (Specialists)
['name' => 'General Physician', 'description' => 'Diagnose and treat common medical conditions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Family Physician', 'description' => 'Provide primary healthcare to families', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Internal Medicine Specialist', 'description' => 'Diagnose and treat adult diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cardiologist', 'description' => 'Specialize in heart and cardiovascular diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cardiothoracic Surgeon', 'description' => 'Perform heart and chest surgeries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Neurologist', 'description' => 'Treat nervous system disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Neurosurgeon', 'description' => 'Perform brain and nervous system surgeries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Orthopedic Surgeon', 'description' => 'Treat bone, joint, and muscle conditions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pediatrician', 'description' => 'Provide medical care to children', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pediatric Surgeon', 'description' => 'Perform surgeries on children', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Gynecologist', 'description' => 'Specialize in female reproductive health', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Obstetrician', 'description' => 'Provide care during pregnancy and childbirth', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dermatologist', 'description' => 'Treat skin, hair, and nail conditions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Ophthalmologist', 'description' => 'Diagnose and treat eye diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ENT Specialist (Otorhinolaryngologist)', 'description' => 'Treat ear, nose, and throat conditions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Psychiatrist', 'description' => 'Diagnose and treat mental health disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinical Psychologist', 'description' => 'Provide psychological assessment and therapy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Oncologist', 'description' => 'Diagnose and treat cancer', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Radiation Oncologist', 'description' => 'Treat cancer using radiation therapy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Surgical Oncologist', 'description' => 'Perform cancer removal surgeries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Gastroenterologist', 'description' => 'Treat digestive system disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nephrologist', 'description' => 'Treat kidney diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Urologist', 'description' => 'Treat urinary tract and male reproductive system', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Endocrinologist', 'description' => 'Treat hormonal and gland disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pulmonologist', 'description' => 'Treat lung and respiratory conditions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Rheumatologist', 'description' => 'Treat arthritis and autoimmune diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Infectious Disease Specialist', 'description' => 'Treat complex infectious diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Allergist/Immunologist', 'description' => 'Treat allergies and immune system disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Geriatrician', 'description' => 'Provide healthcare to elderly patients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Emergency Medicine Physician', 'description' => 'Work in emergency departments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Intensivist (Critical Care Specialist)', 'description' => 'Manage ICU patients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Anesthesiologist', 'description' => 'Administer anesthesia during surgeries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Radiologist', 'description' => 'Interpret medical images', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Interventional Radiologist', 'description' => 'Perform minimally invasive procedures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pathologist', 'description' => 'Analyze tissue and fluid samples', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinical Pathologist', 'description' => 'Oversee laboratory testing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Forensic Pathologist', 'description' => 'Determine cause of death', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plastic Surgeon', 'description' => 'Perform reconstructive and cosmetic surgery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'General Surgeon', 'description' => 'Perform various surgical procedures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vascular Surgeon', 'description' => 'Treat blood vessel disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bariatric Surgeon', 'description' => 'Perform weight loss surgeries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Oral & Maxillofacial Surgeon', 'description' => 'Perform mouth and jaw surgeries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sports Medicine Physician', 'description' => 'Treat sports-related injuries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Physical Medicine & Rehabilitation Specialist', 'description' => 'Help patients recover function', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Palliative Care Specialist', 'description' => 'Provide comfort care for serious illnesses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sleep Medicine Specialist', 'description' => 'Diagnose and treat sleep disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Dental Professionals
['name' => 'Dentist (General)', 'description' => 'Provide general dental care', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Orthodontist', 'description' => 'Correct teeth alignment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Endodontist', 'description' => 'Perform root canal treatments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Periodontist', 'description' => 'Treat gum diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Prosthodontist', 'description' => 'Replace missing teeth', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pediatric Dentist', 'description' => 'Provide dental care to children', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Oral Pathologist', 'description' => 'Diagnose oral diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dental Surgeon', 'description' => 'Perform dental surgeries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cosmetic Dentist', 'description' => 'Improve dental aesthetics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dental Implantologist', 'description' => 'Place dental implants', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Nursing Professionals
['name' => 'Staff Nurse', 'description' => 'Provide basic patient care', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Registered Nurse (RN)', 'description' => 'Licensed nursing professional', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Staff Nurse', 'description' => 'Lead nursing team on shifts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nurse Manager', 'description' => 'Manage nursing department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nursing Superintendent', 'description' => 'Oversee entire nursing services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ICU Nurse', 'description' => 'Provide critical care in ICU', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Emergency Room Nurse', 'description' => 'Work in emergency department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Operation Theatre Nurse', 'description' => 'Assist in surgical procedures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pediatric Nurse', 'description' => 'Provide care to children', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Psychiatric Nurse', 'description' => 'Care for mental health patients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Community Health Nurse', 'description' => 'Provide healthcare in community settings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nurse Educator', 'description' => 'Train nursing students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinical Nurse Specialist', 'description' => 'Expert in specialized nursing area', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nurse Anesthetist', 'description' => 'Administer anesthesia', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nurse Practitioner', 'description' => 'Advanced practice registered nurse', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Paramedical & Technical Staff
['name' => 'Medical Lab Technician', 'description' => 'Perform laboratory tests', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Lab Technician', 'description' => 'Supervise lab operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Radiology Technician', 'description' => 'Operate X-ray and imaging equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CT Scan Technician', 'description' => 'Perform CT scans', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'MRI Technician', 'description' => 'Operate MRI machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Ultrasound Technician (Sonographer)', 'description' => 'Perform ultrasound procedures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Echocardiography Technician', 'description' => 'Perform heart ultrasound', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ECG Technician', 'description' => 'Perform electrocardiograms', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EEG Technician', 'description' => 'Perform brain wave tests', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dialysis Technician', 'description' => 'Operate dialysis machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Operation Theatre Technician', 'description' => 'Assist in surgical setup', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Anesthesia Technician', 'description' => 'Assist anesthesiologists', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Physiotherapy Technician', 'description' => 'Assist physiotherapists', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Occupational Therapy Technician', 'description' => 'Assist occupational therapists', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Respiratory Therapist', 'description' => 'Treat breathing disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cardiac Technician', 'description' => 'Perform cardiac diagnostic tests', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pathology Lab Assistant', 'description' => 'Support lab operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Phlebotomist', 'description' => 'Draw blood samples', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Record Technician', 'description' => 'Manage patient records', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Health Information Technician', 'description' => 'Manage health data systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Allied Health Professionals
['name' => 'Physiotherapist', 'description' => 'Provide physical therapy treatment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Physiotherapist', 'description' => 'Lead physiotherapy department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Occupational Therapist', 'description' => 'Help patients perform daily activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Speech Therapist', 'description' => 'Treat speech and communication disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Audiologist', 'description' => 'Diagnose and treat hearing disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dietitian/Nutritionist', 'description' => 'Provide dietary and nutrition advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinical Dietitian', 'description' => 'Provide medical nutrition therapy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pharmacist', 'description' => 'Dispense medications and advise patients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinical Pharmacist', 'description' => 'Provide clinical pharmacy services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hospital Pharmacist', 'description' => 'Manage hospital pharmacy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Retail Pharmacist', 'description' => 'Work in retail pharmacy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Optometrist', 'description' => 'Perform eye examinations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Orthoptist', 'description' => 'Treat eye movement disorders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Prosthetist & Orthotist', 'description' => 'Create artificial limbs and braces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Psychologist', 'description' => 'Provide psychological counseling', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Counseling Psychologist', 'description' => 'Provide therapy and counseling', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Worker (Medical)', 'description' => 'Provide patient support services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Art Therapist', 'description' => 'Use art for therapy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Music Therapist', 'description' => 'Use music for therapeutic purposes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Alternative Medicine
['name' => 'Ayurvedic Doctor (BAMS)', 'description' => 'Practice Ayurvedic medicine', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Homeopathic Doctor (BHMS)', 'description' => 'Practice Homeopathic medicine', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Unani Doctor (BUMS)', 'description' => 'Practice Unani medicine', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Siddha Doctor (BSMS)', 'description' => 'Practice Siddha medicine', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Naturopath', 'description' => 'Practice natural healing methods', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Yoga Therapist', 'description' => 'Use yoga for therapeutic purposes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Acupuncturist', 'description' => 'Perform acupuncture treatments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chiropractor', 'description' => 'Treat spinal and joint issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Hospital Administration & Management
['name' => 'Hospital Administrator', 'description' => 'Manage hospital operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Superintendent', 'description' => 'Oversee medical services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hospital Manager', 'description' => 'Manage hospital administration', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinic Manager', 'description' => 'Manage clinic operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Director', 'description' => 'Lead medical staff and policies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Medical Officer (CMO)', 'description' => 'Lead medical strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Healthcare Administrator', 'description' => 'Manage healthcare facilities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Patient Relations Manager', 'description' => 'Handle patient grievances', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Manager - Hospital', 'description' => 'Ensure healthcare quality standards', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Records Manager', 'description' => 'Manage medical records department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Infection Control Officer', 'description' => 'Manage infection prevention', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hospital Operations Manager', 'description' => 'Manage daily hospital operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Emergency & Ambulance Services
['name' => 'EMT (Emergency Medical Technician)', 'description' => 'Provide emergency medical response', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Paramedic', 'description' => 'Advanced emergency medical care', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Ambulance Driver', 'description' => 'Drive emergency vehicles', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Emergency Medical Dispatcher', 'description' => 'Coordinate emergency responses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Flight Paramedic', 'description' => 'Provide air ambulance services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Medical Research & Education
['name' => 'Medical Researcher', 'description' => 'Conduct medical research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinical Research Associate', 'description' => 'Manage clinical trials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinical Research Coordinator', 'description' => 'Coordinate research studies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Professor', 'description' => 'Teach medical students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Lecturer', 'description' => 'Teach in medical college', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Anatomy Professor', 'description' => 'Teach anatomy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Physiology Professor', 'description' => 'Teach physiology', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pharmacology Professor', 'description' => 'Teach pharmacology', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pathology Professor', 'description' => 'Teach pathology', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Education Coordinator', 'description' => 'Coordinate medical training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Writer', 'description' => 'Write medical content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Editor', 'description' => 'Edit medical publications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Public Health
['name' => 'Public Health Officer', 'description' => 'Manage public health programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Epidemiologist', 'description' => 'Study disease patterns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Community Health Worker', 'description' => 'Provide community healthcare', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Health Educator', 'description' => 'Educate communities on health', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Biostatistician', 'description' => 'Analyze health data', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Public Health Consultant', 'description' => 'Advise on public health policies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Health Program Manager', 'description' => 'Manage health programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Pharmaceutical & Medical Sales
['name' => 'Medical Representative', 'description' => 'Promote pharmaceutical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Medical Representative', 'description' => 'Lead sales in territory', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Area Sales Manager - Pharma', 'description' => 'Manage regional pharma sales', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Manager - Pharma', 'description' => 'Manage pharmaceutical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Brand Manager - Pharma', 'description' => 'Manage pharma brand strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Science Liaison', 'description' => 'Connect pharma with medical experts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clinical Sales Specialist', 'description' => 'Sell medical devices/equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hospital Sales Representative', 'description' => 'Sell to hospitals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Medical Coding & Billing
['name' => 'Medical Coder', 'description' => 'Code medical diagnoses and procedures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Medical Coder', 'description' => 'Lead coding team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Billing Specialist', 'description' => 'Process medical insurance claims', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Billing Manager', 'description' => 'Manage billing operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Revenue Cycle Manager', 'description' => 'Manage healthcare revenue cycle', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Claims Processor', 'description' => 'Process insurance claims', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Telemedicine & Digital Health
['name' => 'Telemedicine Doctor', 'description' => 'Provide remote consultations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Telehealth Coordinator', 'description' => 'Manage telehealth services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Health Specialist', 'description' => 'Implement digital health solutions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'E-Health Consultant', 'description' => 'Advise on e-health systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Veterinary Medicine
['name' => 'Veterinary Doctor', 'description' => 'Treat animal diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Veterinary Surgeon', 'description' => 'Perform animal surgeries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Veterinary Pathologist', 'description' => 'Diagnose animal diseases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Veterinary Radiologist', 'description' => 'Interpret animal imaging', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Veterinary Technician', 'description' => 'Assist veterinary doctors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level Medical Positions
['name' => 'Medical Intern', 'description' => 'Internship for medical students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Resident', 'description' => 'Post-graduate medical training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Doctor', 'description' => 'Entry-level medical position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'House Surgeon', 'description' => 'Residential surgical training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Officer', 'description' => 'Entry-level hospital doctor', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Duty Doctor', 'description' => 'Shift-based medical officer', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Casualty Medical Officer', 'description' => 'Work in emergency department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Rural Medical Officer', 'description' => 'Serve in rural healthcare', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Support Staff
['name' => 'Hospital Receptionist', 'description' => 'Manage hospital front desk', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Patient Care Coordinator', 'description' => 'Coordinate patient services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Secretary', 'description' => 'Provide secretarial support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Ward Clerk', 'description' => 'Manage ward administration', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Transcriptionist', 'description' => 'Transcribe medical reports', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hospital Housekeeper', 'description' => 'Maintain hospital cleanliness', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Ward Boy/Attendant', 'description' => 'Assist in patient care', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hospital Security Guard', 'description' => 'Ensure hospital security', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// ========== MECHANICAL ENGINEERING POSITIONS ==========

// Core Mechanical Engineering
['name' => 'Mechanical Engineer', 'description' => 'Design, develop, and test mechanical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Mechanical Engineer', 'description' => 'Lead mechanical design and development projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Mechanical Engineer', 'description' => 'Assist in mechanical design and analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechanical Design Engineer', 'description' => 'Create detailed mechanical designs and drawings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechanical Project Engineer', 'description' => 'Manage mechanical engineering projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechanical Maintenance Engineer', 'description' => 'Maintain and repair mechanical equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechanical Site Engineer', 'description' => 'Supervise mechanical installation at sites', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechanical Field Engineer', 'description' => 'Provide on-site mechanical engineering support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Design & CAD
['name' => 'CAD Designer/Engineer', 'description' => 'Create 2D and 3D CAD models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior CAD Engineer', 'description' => 'Lead CAD design team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CAD/CAM Engineer', 'description' => 'Design using CAD/CAM software', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SolidWorks Designer', 'description' => 'Create designs using SolidWorks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'AutoCAD Drafter', 'description' => 'Create technical drawings in AutoCAD', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => '3D Modeling Engineer', 'description' => 'Create 3D mechanical models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Design Engineer', 'description' => 'Design mechanical products from concept to production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Product Design Engineer', 'description' => 'Lead product design initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Analysis & Simulation
['name' => 'FEA Engineer', 'description' => 'Perform Finite Element Analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CFD Engineer', 'description' => 'Perform Computational Fluid Dynamics analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Simulation Engineer', 'description' => 'Simulate mechanical systems performance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Stress Analysis Engineer', 'description' => 'Analyze structural stress and strain', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Thermal Analysis Engineer', 'description' => 'Analyze heat transfer and thermal systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vibration Analysis Engineer', 'description' => 'Analyze mechanical vibrations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ANSYS Engineer', 'description' => 'Perform simulations using ANSYS', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Manufacturing & Production
['name' => 'Manufacturing Engineer', 'description' => 'Optimize manufacturing processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Manufacturing Engineer', 'description' => 'Lead manufacturing engineering team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Engineer', 'description' => 'Manage production operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Engineer - Mechanical', 'description' => 'Design and improve manufacturing processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Engineer', 'description' => 'Improve industrial efficiency', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lean Manufacturing Engineer', 'description' => 'Implement lean manufacturing principles', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Six Sigma Engineer', 'description' => 'Apply Six Sigma methodologies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assembly Engineer', 'description' => 'Design assembly processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tooling Engineer', 'description' => 'Design tools and fixtures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Die Design Engineer', 'description' => 'Design dies for manufacturing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mold Design Engineer', 'description' => 'Design molds for injection molding', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Jig & Fixture Designer', 'description' => 'Design manufacturing jigs and fixtures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CNC Programmer', 'description' => 'Program CNC machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CNC Operator', 'description' => 'Operate CNC machinery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Quality Engineering
['name' => 'Quality Engineer - Mechanical', 'description' => 'Ensure mechanical product quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Quality Engineer', 'description' => 'Lead quality engineering team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Assurance Engineer', 'description' => 'Implement QA processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Control Inspector', 'description' => 'Inspect mechanical components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'NDT Engineer', 'description' => 'Perform non-destructive testing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Metrology Engineer', 'description' => 'Perform precision measurements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMM Programmer', 'description' => 'Program Coordinate Measuring Machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Maintenance & Reliability
['name' => 'Maintenance Engineer', 'description' => 'Plan and execute equipment maintenance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Maintenance Engineer', 'description' => 'Lead maintenance team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Reliability Engineer', 'description' => 'Improve equipment reliability', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plant Maintenance Engineer', 'description' => 'Maintain plant equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Predictive Maintenance Engineer', 'description' => 'Implement predictive maintenance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Rotating Equipment Engineer', 'description' => 'Specialize in rotating machinery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Static Equipment Engineer', 'description' => 'Maintain static equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// HVAC & Refrigeration
['name' => 'HVAC Engineer', 'description' => 'Design heating, ventilation, and AC systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior HVAC Engineer', 'description' => 'Lead HVAC design projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HVAC Design Engineer', 'description' => 'Create HVAC system designs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Refrigeration Engineer', 'description' => 'Design refrigeration systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chiller Engineer', 'description' => 'Specialize in chiller systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HVAC Technician', 'description' => 'Install and maintain HVAC systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HVAC Project Manager', 'description' => 'Manage HVAC projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Piping & Pipeline Engineering
['name' => 'Piping Engineer', 'description' => 'Design piping systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Piping Engineer', 'description' => 'Lead piping design team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pipeline Engineer', 'description' => 'Design and maintain pipelines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Piping Stress Engineer', 'description' => 'Analyze piping stress', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Piping Designer', 'description' => 'Create piping layouts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pipe Support Engineer', 'description' => 'Design pipe support systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Automotive Engineering
['name' => 'Automotive Engineer', 'description' => 'Design and develop vehicles', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Automotive Engineer', 'description' => 'Lead automotive design projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vehicle Dynamics Engineer', 'description' => 'Analyze vehicle handling and stability', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Engine Designer', 'description' => 'Design internal combustion engines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Transmission Engineer', 'description' => 'Design transmission systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chassis Engineer', 'description' => 'Design vehicle chassis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Body Engineer', 'description' => 'Design vehicle body structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Brake Systems Engineer', 'description' => 'Design brake systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Suspension Engineer', 'description' => 'Design suspension systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Steering Engineer', 'description' => 'Design steering systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electric Vehicle Engineer', 'description' => 'Design EV powertrains', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Battery Engineer', 'description' => 'Design EV battery systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Aerospace Engineering
['name' => 'Aerospace Engineer', 'description' => 'Design aircraft and spacecraft', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Aeronautical Engineer', 'description' => 'Specialize in aircraft design', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Aircraft Design Engineer', 'description' => 'Design aircraft structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Propulsion Engineer', 'description' => 'Design propulsion systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Aerodynamics Engineer', 'description' => 'Analyze aerodynamic performance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Aviation Maintenance Engineer', 'description' => 'Maintain aircraft', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Flight Test Engineer', 'description' => 'Conduct aircraft flight tests', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Power Plant & Energy
['name' => 'Power Plant Engineer', 'description' => 'Manage power plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Thermal Power Engineer', 'description' => 'Specialize in thermal power', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Turbine Engineer', 'description' => 'Design and maintain turbines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Boiler Engineer', 'description' => 'Design and maintain boilers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Renewable Energy Engineer', 'description' => 'Design renewable energy systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Solar Thermal Engineer', 'description' => 'Design solar thermal systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Wind Turbine Engineer', 'description' => 'Design wind turbines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hydro Power Engineer', 'description' => 'Design hydroelectric systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nuclear Engineer', 'description' => 'Work with nuclear systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Robotics & Automation
['name' => 'Robotics Engineer', 'description' => 'Design and develop robots', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Automation Engineer', 'description' => 'Implement automation systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechatronics Engineer', 'description' => 'Integrate mechanical and electronic systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Robotics Engineer', 'description' => 'Lead robotics projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Robotics Engineer', 'description' => 'Implement industrial robots', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PLC Programmer', 'description' => 'Program PLC controllers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SCADA Engineer', 'description' => 'Design SCADA systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Material Science & Metallurgy
['name' => 'Metallurgical Engineer', 'description' => 'Study and process metals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Materials Engineer', 'description' => 'Select and test materials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Welding Engineer', 'description' => 'Design welding processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Heat Treatment Engineer', 'description' => 'Manage heat treatment processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Composite Materials Engineer', 'description' => 'Work with composite materials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corrosion Engineer', 'description' => 'Prevent material corrosion', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Failure Analysis Engineer', 'description' => 'Analyze component failures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Tool & Die Engineering
['name' => 'Tool Room Engineer', 'description' => 'Manage tool room operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Die Casting Engineer', 'description' => 'Design die casting processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Forging Engineer', 'description' => 'Design forging processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Press Tool Designer', 'description' => 'Design press tools', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mould Designer', 'description' => 'Design injection molds', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Hydraulics & Pneumatics
['name' => 'Hydraulic Engineer', 'description' => 'Design hydraulic systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pneumatic Engineer', 'description' => 'Design pneumatic systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fluid Power Engineer', 'description' => 'Specialize in fluid power systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hydraulic Systems Designer', 'description' => 'Create hydraulic circuit designs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Heavy Equipment & Machinery
['name' => 'Heavy Equipment Engineer', 'description' => 'Design heavy machinery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Equipment Engineer', 'description' => 'Design construction machinery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Agricultural Engineer', 'description' => 'Design farm equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Material Handling Engineer', 'description' => 'Design material handling systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Crane Engineer', 'description' => 'Design and maintain cranes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Conveyor Systems Engineer', 'description' => 'Design conveyor systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Marine Engineering
['name' => 'Marine Engineer', 'description' => 'Design ship systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Naval Architect', 'description' => 'Design ships and vessels', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shipbuilding Engineer', 'description' => 'Manage ship construction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Offshore Engineer', 'description' => 'Design offshore structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marine Diesel Engineer', 'description' => 'Maintain marine engines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Project Management
['name' => 'Mechanical Project Manager', 'description' => 'Lead mechanical engineering projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Project Manager - Mechanical', 'description' => 'Manage large mechanical projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Project Manager', 'description' => 'Manage construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EPC Project Engineer', 'description' => 'Manage EPC projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Turnkey Project Engineer', 'description' => 'Manage turnkey projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Sales & Applications
['name' => 'Technical Sales Engineer - Mechanical', 'description' => 'Sell mechanical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Application Engineer', 'description' => 'Provide technical application support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Application Engineer', 'description' => 'Lead application engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Support Engineer', 'description' => 'Support mechanical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Service Engineer - Mechanical', 'description' => 'Provide field service', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Procurement & Supply Chain
['name' => 'Mechanical Procurement Engineer', 'description' => 'Procure mechanical components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vendor Development Engineer', 'description' => 'Develop mechanical vendors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Supply Chain Engineer', 'description' => 'Manage mechanical supply chain', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sourcing Engineer', 'description' => 'Source mechanical components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Research & Development
['name' => 'R&D Mechanical Engineer', 'description' => 'Conduct mechanical research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior R&D Engineer', 'description' => 'Lead R&D projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Innovation Engineer', 'description' => 'Drive mechanical innovation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Prototype Engineer', 'description' => 'Build mechanical prototypes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Testing & Validation Engineer', 'description' => 'Test mechanical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level & Trainee Positions
['name' => 'Graduate Engineer Trainee - Mechanical', 'description' => 'Training program for fresh graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechanical Engineering Intern', 'description' => 'Internship for mechanical students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Mechanical Engineer', 'description' => 'Entry-level support role', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Design Engineer', 'description' => 'Entry-level design position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trainee Mechanical Engineer', 'description' => 'Training position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Apprentice - Mechanical', 'description' => 'Apprenticeship program', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Technical & Supervisor Roles
['name' => 'Mechanical Supervisor', 'description' => 'Supervise mechanical work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Mechanical Supervisor', 'description' => 'Lead mechanical supervision', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechanical Foreman', 'description' => 'Manage mechanical crews', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechanical Technician', 'description' => 'Perform mechanical maintenance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Mechanical Technician', 'description' => 'Lead technical team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fitter', 'description' => 'Assemble mechanical components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Welder', 'description' => 'Perform welding operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Machinist', 'description' => 'Operate machining equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Turner', 'description' => 'Operate lathe machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Milling Machine Operator', 'description' => 'Operate milling machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grinder', 'description' => 'Perform grinding operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Die Maker', 'description' => 'Manufacture dies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tool Maker', 'description' => 'Manufacture tools', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plumber', 'description' => 'Install and repair plumbing systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pipe Fitter', 'description' => 'Install piping systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HVAC Technician', 'description' => 'Install and maintain HVAC', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Refrigeration Technician', 'description' => 'Maintain refrigeration systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Safety & Compliance
['name' => 'Mechanical Safety Engineer', 'description' => 'Ensure mechanical safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Machine Safety Inspector', 'description' => 'Inspect machine safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pressure Vessel Inspector', 'description' => 'Inspect pressure vessels', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Boiler Inspector', 'description' => 'Inspect boiler systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lifting Equipment Inspector', 'description' => 'Inspect cranes and lifting gear', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// ========== ELECTRICAL ENGINEERING POSITIONS ==========

// Core Electrical Engineering
['name' => 'Electrical Engineer', 'description' => 'Design, develop, and test electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Electrical Engineer', 'description' => 'Lead electrical design and development projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Electrical Engineer', 'description' => 'Assist in electrical design and analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Design Engineer', 'description' => 'Create detailed electrical designs and schematics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Project Engineer', 'description' => 'Manage electrical engineering projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Maintenance Engineer', 'description' => 'Maintain and repair electrical equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Site Engineer', 'description' => 'Supervise electrical installation at sites', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Field Engineer', 'description' => 'Provide on-site electrical engineering support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Power Systems Engineering
['name' => 'Power Systems Engineer', 'description' => 'Design and analyze power systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Power Systems Engineer', 'description' => 'Lead power system projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Power Distribution Engineer', 'description' => 'Design power distribution networks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Power Transmission Engineer', 'description' => 'Design transmission lines and substations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Substation Engineer', 'description' => 'Design and maintain substations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Switchgear Engineer', 'description' => 'Design switchgear and protection systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Protection Engineer', 'description' => 'Design electrical protection systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Relay Engineer', 'description' => 'Configure and test protection relays', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Load Dispatch Engineer', 'description' => 'Manage power grid operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grid Operation Engineer', 'description' => 'Operate and maintain power grid', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Power Generation
['name' => 'Power Plant Engineer', 'description' => 'Manage power plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Thermal Power Plant Engineer', 'description' => 'Specialize in thermal power generation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hydro Power Engineer', 'description' => 'Design and operate hydroelectric plants', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nuclear Power Engineer', 'description' => 'Work with nuclear power systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Solar Power Engineer', 'description' => 'Design solar power systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Wind Power Engineer', 'description' => 'Design wind farm electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Renewable Energy Engineer', 'description' => 'Design renewable energy systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Generator Engineer', 'description' => 'Maintain and repair generators', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Turbine Engineer', 'description' => 'Maintain power plant turbines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Electrical Design & Drafting
['name' => 'Electrical CAD Designer', 'description' => 'Create electrical drawings using CAD', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Electrical Designer', 'description' => 'Lead electrical design team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'AutoCAD Electrical Designer', 'description' => 'Create electrical schematics in AutoCAD', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'REVIT Electrical Designer', 'description' => 'Create BIM electrical models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Drafter', 'description' => 'Prepare electrical drawings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SLD Designer', 'description' => 'Create single line diagrams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Control Systems & Automation
['name' => 'Control Systems Engineer', 'description' => 'Design control systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Control Systems Engineer', 'description' => 'Lead control system projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Automation Engineer', 'description' => 'Implement industrial automation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PLC Programmer', 'description' => 'Program PLC controllers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SCADA Engineer', 'description' => 'Design SCADA systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'DCS Engineer', 'description' => 'Design Distributed Control Systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HMI Designer', 'description' => 'Design human-machine interfaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Automation Engineer', 'description' => 'Automate industrial processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Control Engineer', 'description' => 'Design process control systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Instrumentation Engineer', 'description' => 'Design and maintain instruments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Instrumentation Engineer', 'description' => 'Lead instrumentation projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Electronics & Embedded Systems
['name' => 'Electronics Engineer', 'description' => 'Design electronic circuits and systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Electronics Engineer', 'description' => 'Lead electronics design', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Embedded Systems Engineer', 'description' => 'Develop embedded systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Firmware Engineer', 'description' => 'Develop firmware for electronics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PCB Design Engineer', 'description' => 'Design printed circuit boards', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hardware Engineer', 'description' => 'Design electronic hardware', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'VLSI Design Engineer', 'description' => 'Design VLSI circuits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'FPGA Engineer', 'description' => 'Program FPGA devices', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ASIC Design Engineer', 'description' => 'Design ASIC chips', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Circuit Design Engineer', 'description' => 'Design analog/digital circuits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Electrical Maintenance & Reliability
['name' => 'Electrical Maintenance Engineer', 'description' => 'Maintain electrical equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Maintenance Engineer', 'description' => 'Lead maintenance team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plant Electrical Engineer', 'description' => 'Manage plant electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Reliability Engineer', 'description' => 'Improve electrical reliability', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Predictive Maintenance Engineer', 'description' => 'Implement predictive maintenance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Motor Engineer', 'description' => 'Maintain electric motors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'VFD Engineer', 'description' => 'Configure VFD systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Building Electrical Systems (MEP)
['name' => 'MEP Engineer', 'description' => 'Design mechanical, electrical, plumbing systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior MEP Engineer', 'description' => 'Lead MEP design projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Building Electrical Engineer', 'description' => 'Design building electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lighting Designer', 'description' => 'Design lighting systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lighting Engineer', 'description' => 'Design lighting solutions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ELV Systems Engineer', 'description' => 'Design Extra Low Voltage systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fire Alarm Engineer', 'description' => 'Design fire alarm systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CCTV Engineer', 'description' => 'Design CCTV systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Access Control Engineer', 'description' => 'Design access control systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Public Address Engineer', 'description' => 'Design PA systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BMS Engineer', 'description' => 'Design Building Management Systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Home Automation Engineer', 'description' => 'Design home automation systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// High Voltage Engineering
['name' => 'High Voltage Engineer', 'description' => 'Specialize in high voltage systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HV Transmission Engineer', 'description' => 'Design HV transmission lines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EHV Engineer', 'description' => 'Work with extra high voltage', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'UHV Engineer', 'description' => 'Work with ultra high voltage', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HVDC Engineer', 'description' => 'Design HVDC systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insulation Coordination Engineer', 'description' => 'Design insulation systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lightning Protection Engineer', 'description' => 'Design lightning protection', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Electrical Testing & Commissioning
['name' => 'Testing & Commissioning Engineer', 'description' => 'Test and commission electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Commissioning Engineer', 'description' => 'Lead commissioning projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Test Engineer', 'description' => 'Perform electrical testing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Protection Testing Engineer', 'description' => 'Test protection systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Substation Commissioning Engineer', 'description' => 'Commission substations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Generator Testing Engineer', 'description' => 'Test generator performance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Transformer Testing Engineer', 'description' => 'Test transformers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Electrical Safety & Compliance
['name' => 'Electrical Safety Engineer', 'description' => 'Ensure electrical safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Inspector', 'description' => 'Inspect electrical installations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Auditor', 'description' => 'Conduct electrical audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Arc Flash Analyst', 'description' => 'Analyze arc flash hazards', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Short Circuit Analyst', 'description' => 'Perform short circuit studies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Code Consultant', 'description' => 'Advise on electrical codes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Renewable Energy
['name' => 'Solar PV Engineer', 'description' => 'Design solar photovoltaic systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Solar Inverter Engineer', 'description' => 'Design solar inverters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Solar Plant Engineer', 'description' => 'Manage solar plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Wind Farm Electrical Engineer', 'description' => 'Design wind farm electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BESS Engineer', 'description' => 'Design Battery Energy Storage Systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Energy Storage Engineer', 'description' => 'Design energy storage systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Smart Grid Engineer', 'description' => 'Implement smart grid technologies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Microgrid Engineer', 'description' => 'Design microgrid systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Electrical Vehicle (EV)
['name' => 'EV Electrical Engineer', 'description' => 'Design electric vehicle systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EV Charging Engineer', 'description' => 'Design EV charging stations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Battery Management System Engineer', 'description' => 'Design BMS for EVs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EV Powertrain Engineer', 'description' => 'Design EV powertrain systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Motor Control Engineer', 'description' => 'Design motor controllers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EV Inverter Engineer', 'description' => 'Design EV inverters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EV Converter Engineer', 'description' => 'Design DC-DC converters for EVs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Telecommunications
['name' => 'Telecom Engineer', 'description' => 'Design telecommunications systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'RF Engineer', 'description' => 'Design radio frequency systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Antenna Engineer', 'description' => 'Design antennas', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Signal Processing Engineer', 'description' => 'Develop signal processing algorithms', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Communication Engineer', 'description' => 'Design communication systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Optical Fiber Engineer', 'description' => 'Design fiber optic systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Wireless Engineer', 'description' => 'Design wireless systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => '5G Engineer', 'description' => 'Implement 5G technology', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Railways & Transportation
['name' => 'Railway Electrical Engineer', 'description' => 'Design railway electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Traction Engineer', 'description' => 'Design traction systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Overhead Line Engineer', 'description' => 'Design OHL for railways', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Railway Signaling Engineer', 'description' => 'Design railway signaling systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Metro Electrical Engineer', 'description' => 'Design metro electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Airport Electrical Engineer', 'description' => 'Design airport electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Quality & Testing
['name' => 'Electrical Quality Engineer', 'description' => 'Ensure electrical quality standards', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical QA/QC Engineer', 'description' => 'Implement QA/QC processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Inspector', 'description' => 'Inspect electrical components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'NEMA Inspector', 'description' => 'Inspect NEMA standards', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IEC Compliance Engineer', 'description' => 'Ensure IEC compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Project Management
['name' => 'Electrical Project Manager', 'description' => 'Manage electrical projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Project Manager - Electrical', 'description' => 'Lead large electrical projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EPC Project Engineer', 'description' => 'Manage EPC electrical projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Electrical Engineer', 'description' => 'Manage construction electrical work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Contract Manager', 'description' => 'Manage electrical contracts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Sales & Applications
['name' => 'Technical Sales Engineer - Electrical', 'description' => 'Sell electrical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Application Engineer', 'description' => 'Provide technical application support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Support Engineer', 'description' => 'Support electrical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Field Application Engineer', 'description' => 'Provide field support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Product Manager', 'description' => 'Manage electrical product lines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Procurement & Supply Chain
['name' => 'Electrical Procurement Engineer', 'description' => 'Procure electrical equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Sourcing Engineer', 'description' => 'Source electrical components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vendor Development Engineer', 'description' => 'Develop electrical vendors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Research & Development
['name' => 'R&D Electrical Engineer', 'description' => 'Conduct electrical research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior R&D Engineer', 'description' => 'Lead R&D projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Innovation Engineer', 'description' => 'Drive electrical innovation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Prototype Engineer', 'description' => 'Build electrical prototypes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level & Trainee
['name' => 'Graduate Engineer Trainee - Electrical', 'description' => 'Training program for fresh graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Engineering Intern', 'description' => 'Internship for electrical students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Electrical Engineer', 'description' => 'Entry-level support role', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Electrical Engineer', 'description' => 'Entry-level design position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trainee Electrical Engineer', 'description' => 'Training position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Apprentice - Electrical', 'description' => 'Apprenticeship program', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Technical & Supervisor Roles
['name' => 'Electrical Supervisor', 'description' => 'Supervise electrical work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Electrical Supervisor', 'description' => 'Lead electrical supervision', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Foreman', 'description' => 'Manage electrical crews', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrician', 'description' => 'Install and repair electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Electrician', 'description' => 'Lead electrical installations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Electrician', 'description' => 'Work in industrial settings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Maintenance Electrician', 'description' => 'Perform electrical maintenance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Panel Builder', 'description' => 'Build electrical panels', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Wiring Technician', 'description' => 'Perform electrical wiring', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cable Jointer', 'description' => 'Join electrical cables', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Technician', 'description' => 'Perform electrical technical work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Electrical Technician', 'description' => 'Lead technical team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Energy Efficiency & Consulting
['name' => 'Energy Auditor', 'description' => 'Conduct energy audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Energy Consultant', 'description' => 'Provide energy consulting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Energy Efficiency Engineer', 'description' => 'Improve energy efficiency', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Demand Side Management Engineer', 'description' => 'Implement DSM programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Smart Meter Engineer', 'description' => 'Implement smart metering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Power Electronics
['name' => 'Power Electronics Engineer', 'description' => 'Design power electronic circuits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Power Electronics Engineer', 'description' => 'Lead power electronics design', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Converter Design Engineer', 'description' => 'Design power converters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inverter Design Engineer', 'description' => 'Design inverters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Rectifier Engineer', 'description' => 'Design rectifier systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SMPS Engineer', 'description' => 'Design Switch Mode Power Supplies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'UPS Engineer', 'description' => 'Design UPS systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Battery Charger Engineer', 'description' => 'Design battery chargers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Illumination Engineering
['name' => 'Illumination Engineer', 'description' => 'Design lighting systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'LED Lighting Engineer', 'description' => 'Design LED lighting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Street Lighting Engineer', 'description' => 'Design street lighting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sports Lighting Engineer', 'description' => 'Design sports facility lighting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Architectural Lighting Designer', 'description' => 'Design architectural lighting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Emergency & Uninterruptible Power
['name' => 'UPS Engineer', 'description' => 'Install and maintain UPS', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Generator Engineer', 'description' => 'Maintain generator systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EPS Engineer', 'description' => 'Design Emergency Power Systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Battery Backup Engineer', 'description' => 'Design battery backup systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Education & Training['name' => 'Electrical Engineering Professor', 'description' => 'Teach electrical engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Engineering Lecturer', 'description' => 'Lecture electrical courses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Trainer', 'description' => 'Provide electrical training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vocational Electrical Instructor', 'description' => 'Teach electrical trades', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// ========== CONSTRUCTION FIELD POSITIONS ==========

// Core Construction Management
['name' => 'Construction Manager', 'description' => 'Oversee construction projects from start to finish', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Construction Manager', 'description' => 'Lead large-scale construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Construction Manager', 'description' => 'Support construction management activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Manager - Construction', 'description' => 'Manage construction project delivery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Project Manager', 'description' => 'Lead complex construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Project Coordinator', 'description' => 'Coordinate construction activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Superintendent', 'description' => 'Supervise daily construction operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'General Superintendent', 'description' => 'Oversee multiple construction sites', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Site Management & Supervision
['name' => 'Site Manager', 'description' => 'Manage construction site operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Site Manager', 'description' => 'Lead large construction sites', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Supervisor', 'description' => 'Supervise site activities and workers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Site Supervisor', 'description' => 'Support site supervision', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Engineer', 'description' => 'Provide technical support on site', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Site Engineer', 'description' => 'Lead site engineering activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Foreman', 'description' => 'Supervise construction crew', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'General Foreman', 'description' => 'Oversee multiple construction teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Civil Engineering
['name' => 'Civil Engineer', 'description' => 'Design and oversee construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Civil Engineer', 'description' => 'Lead civil engineering design', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Civil Engineer', 'description' => 'Assist in civil engineering tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Structural Engineer', 'description' => 'Design building structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Structural Engineer', 'description' => 'Lead structural design', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Geotechnical Engineer', 'description' => 'Analyze soil and foundation conditions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Foundation Engineer', 'description' => 'Design building foundations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Earthworks Engineer', 'description' => 'Manage earthmoving operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Architecture & Design
['name' => 'Architect', 'description' => 'Design buildings and structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Architect', 'description' => 'Lead architectural design projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Architect', 'description' => 'Assist in architectural design', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Architectural Designer', 'description' => 'Create architectural designs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Landscape Architect', 'description' => 'Design outdoor spaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Urban Designer', 'description' => 'Design urban spaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CAD Technician', 'description' => 'Create technical drawings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BIM Modeler', 'description' => 'Create Building Information Models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BIM Coordinator', 'description' => 'Coordinate BIM processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BIM Manager', 'description' => 'Manage BIM implementation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Quantity Surveying & Estimation
['name' => 'Quantity Surveyor', 'description' => 'Manage construction costs and contracts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Quantity Surveyor', 'description' => 'Lead quantity surveying', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Quantity Surveyor', 'description' => 'Assist in quantity surveying', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cost Engineer', 'description' => 'Manage construction costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cost Estimator', 'description' => 'Estimate construction costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Estimator', 'description' => 'Lead cost estimation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Billing Engineer', 'description' => 'Manage construction billing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Contracts Manager', 'description' => 'Manage construction contracts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Claims Consultant', 'description' => 'Handle construction claims', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Planning & Scheduling
['name' => 'Planning Engineer', 'description' => 'Create construction schedules', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Planning Engineer', 'description' => 'Lead project planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Planner', 'description' => 'Develop project plans', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Scheduler', 'description' => 'Create and maintain schedules', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Primavera Planner', 'description' => 'Use Primavera for planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'MS Project Planner', 'description' => 'Use MS Project for planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Quality Control & Assurance
['name' => 'Quality Control Engineer', 'description' => 'Ensure construction quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Assurance Engineer', 'description' => 'Implement QA processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Manager - Construction', 'description' => 'Lead quality management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Civil Inspector', 'description' => 'Inspect civil works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Materials Engineer', 'description' => 'Test construction materials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Concrete Engineer', 'description' => 'Manage concrete quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Soil Technician', 'description' => 'Test soil quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Safety & Environmental
['name' => 'Safety Officer', 'description' => 'Ensure site safety compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Safety Officer', 'description' => 'Lead safety programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Safety Manager', 'description' => 'Manage construction safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HSE Officer', 'description' => 'Manage health, safety, environment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HSE Manager', 'description' => 'Lead HSE programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Environmental Engineer', 'description' => 'Manage environmental compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fire Safety Officer', 'description' => 'Manage fire safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Mechanical Construction
['name' => 'Mechanical Engineer - Construction', 'description' => 'Design mechanical systems for buildings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HVAC Engineer', 'description' => 'Design HVAC systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plumbing Engineer', 'description' => 'Design plumbing systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fire Fighting Engineer', 'description' => 'Design fire suppression systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'MEP Engineer', 'description' => 'Coordinate MEP systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'MEP Manager', 'description' => 'Manage MEP construction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Electrical Construction
['name' => 'Electrical Engineer - Construction', 'description' => 'Design electrical systems for buildings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Site Engineer', 'description' => 'Supervise electrical installation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lighting Engineer', 'description' => 'Design lighting systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ELV Engineer', 'description' => 'Design Extra Low Voltage systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BMS Engineer', 'description' => 'Design Building Management Systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Interior & Finishing
['name' => 'Interior Designer', 'description' => 'Design interior spaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Interior Designer', 'description' => 'Lead interior design projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finishing Engineer', 'description' => 'Manage finishing works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finishing Foreman', 'description' => 'Supervise finishing crew', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Paint Supervisor', 'description' => 'Supervise painting works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Flooring Specialist', 'description' => 'Install flooring materials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tiling Supervisor', 'description' => 'Supervise tiling works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Carpentry Supervisor', 'description' => 'Supervise carpentry works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Structural & Steel Work
['name' => 'Structural Steel Engineer', 'description' => 'Design steel structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Steel Detailer', 'description' => 'Detail steel connections', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Steel Fabrication Engineer', 'description' => 'Manage steel fabrication', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Steel Erection Supervisor', 'description' => 'Supervise steel erection', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Welding Inspector', 'description' => 'Inspect welding quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'NDT Technician', 'description' => 'Perform non-destructive testing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Concrete & Formwork
['name' => 'Concrete Engineer', 'description' => 'Manage concrete works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Formwork Engineer', 'description' => 'Design formwork systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Formwork Supervisor', 'description' => 'Supervise formwork installation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Reinforcement Engineer', 'description' => 'Design rebar placement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Rebar Detailer', 'description' => 'Detail rebar schedules', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Concrete Pump Operator', 'description' => 'Operate concrete pumps', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Road & Infrastructure
['name' => 'Road Construction Engineer', 'description' => 'Manage road construction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Highway Engineer', 'description' => 'Design highways', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bridge Engineer', 'description' => 'Design bridges', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tunnel Engineer', 'description' => 'Design tunnels', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Asphalt Engineer', 'description' => 'Manage asphalt works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pavement Engineer', 'description' => 'Design pavements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Surveyor', 'description' => 'Conduct land surveys', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Land Surveyor', 'description' => 'Measure land boundaries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quantity Surveyor - Roads', 'description' => 'Manage road project costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Equipment & Machinery
['name' => 'Equipment Manager', 'description' => 'Manage construction equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Heavy Equipment Operator', 'description' => 'Operate heavy machinery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Excavator Operator', 'description' => 'Operate excavators', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Crane Operator', 'description' => 'Operate cranes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bulldozer Operator', 'description' => 'Operate bulldozers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Loader Operator', 'description' => 'Operate loaders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grader Operator', 'description' => 'Operate graders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Roller Operator', 'description' => 'Operate rollers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Forklift Operator', 'description' => 'Operate forklifts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Equipment Maintenance Technician', 'description' => 'Maintain construction equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Logistics & Material Management
['name' => 'Material Manager', 'description' => 'Manage construction materials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Store Keeper', 'description' => 'Manage construction store', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inventory Controller', 'description' => 'Control material inventory', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Logistics Coordinator', 'description' => 'Coordinate material logistics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Purchase Officer', 'description' => 'Procure construction materials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Procurement Manager', 'description' => 'Manage procurement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Commercial & Contracts
['name' => 'Commercial Manager', 'description' => 'Manage commercial aspects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Contract Administrator', 'description' => 'Administer contracts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Contracts Engineer', 'description' => 'Manage engineering contracts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Claims Engineer', 'description' => 'Handle contract claims', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tendering Engineer', 'description' => 'Prepare tender documents', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bid Manager', 'description' => 'Manage bid submissions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Documentation & Administration
['name' => 'Document Controller', 'description' => 'Manage construction documents', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Document Controller', 'description' => 'Lead documentation team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Administrator', 'description' => 'Provide project admin support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Administrator', 'description' => 'Manage site administration', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Timekeeper', 'description' => 'Track worker attendance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Skilled Trades
['name' => 'Carpenter', 'description' => 'Perform carpentry work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Carpenter', 'description' => 'Lead carpentry team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mason', 'description' => 'Lay bricks and blocks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Mason', 'description' => 'Lead masonry team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plumber', 'description' => 'Install plumbing systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Plumber', 'description' => 'Lead plumbing team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrician', 'description' => 'Install electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Electrician', 'description' => 'Lead electrical team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HVAC Technician', 'description' => 'Install HVAC systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Welder', 'description' => 'Perform welding work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Steel Fixer', 'description' => 'Install reinforcement steel', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Scaffolder', 'description' => 'Erect scaffolding', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Painter', 'description' => 'Perform painting work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tiler', 'description' => 'Install tiles', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Flooring Installer', 'description' => 'Install flooring', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Glazier', 'description' => 'Install glass and windows', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Roofer', 'description' => 'Install roofing systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insulation Installer', 'description' => 'Install insulation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Drywall Installer', 'description' => 'Install drywall', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Ceiling Installer', 'description' => 'Install false ceilings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// General Labor
['name' => 'Construction Laborer', 'description' => 'Perform general construction tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Skilled Laborer', 'description' => 'Perform skilled construction tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Helper', 'description' => 'Assist skilled tradespeople', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'General Worker', 'description' => 'Perform various construction tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Cleaner', 'description' => 'Maintain site cleanliness', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Specialized Construction
['name' => 'Demolition Engineer', 'description' => 'Plan demolition works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Piling Engineer', 'description' => 'Manage piling works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dewatering Engineer', 'description' => 'Manage dewatering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grouting Engineer', 'description' => 'Perform grouting works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shotcrete Engineer', 'description' => 'Manage shotcrete application', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Waterproofing Engineer', 'description' => 'Design waterproofing systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Waterproofer', 'description' => 'Apply waterproofing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Precast & Prefabrication
['name' => 'Precast Engineer', 'description' => 'Design precast elements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Precast Production Manager', 'description' => 'Manage precast production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Precast Erection Supervisor', 'description' => 'Supervise precast erection', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Prefab Engineer', 'description' => 'Design prefabricated buildings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Green Building & Sustainability
['name' => 'Green Building Consultant', 'description' => 'Advise on sustainable construction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'LEED Consultant', 'description' => 'Manage LEED certification', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sustainability Engineer', 'description' => 'Implement sustainable practices', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Energy Modeler', 'description' => 'Create energy models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Land Development
['name' => 'Land Development Engineer', 'description' => 'Plan land development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Development Engineer', 'description' => 'Design site development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grading Engineer', 'description' => 'Design site grading', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Drainage Engineer', 'description' => 'Design drainage systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Stormwater Engineer', 'description' => 'Manage stormwater', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level & Training
['name' => 'Graduate Engineer Trainee - Civil', 'description' => 'Training for civil graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Management Trainee', 'description' => 'Management training program', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Intern', 'description' => 'Internship in construction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Engineer Trainee', 'description' => 'Training for site engineers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Apprentice - Construction', 'description' => 'Construction apprenticeship', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Inspection & Testing
['name' => 'Building Inspector', 'description' => 'Inspect building compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Civil Inspector', 'description' => 'Inspect civil works', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Structural Inspector', 'description' => 'Inspect structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Material Testing Technician', 'description' => 'Test construction materials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Non-Destructive Testing Technician', 'description' => 'Perform NDT', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Project Controls
['name' => 'Project Controls Manager', 'description' => 'Manage project controls', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cost Control Engineer', 'description' => 'Control project costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Manager', 'description' => 'Manage project risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Change Management Engineer', 'description' => 'Manage project changes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Earned Value Analyst', 'description' => 'Analyze earned value', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Facade & Cladding
['name' => 'Facade Engineer', 'description' => 'Design building facades', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cladding Specialist', 'description' => 'Install cladding systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Curtain Wall Engineer', 'description' => 'Design curtain walls', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Glazing Contractor', 'description' => 'Install glazing systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Lifts & Elevators
['name' => 'Elevator Engineer', 'description' => 'Install elevators', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lift Technician', 'description' => 'Maintain lifts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Escalator Engineer', 'description' => 'Install escalators', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Swimming Pools & Water Features
['name' => 'Pool Construction Engineer', 'description' => 'Build swimming pools', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pool Technician', 'description' => 'Maintain pools', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Water Feature Specialist', 'description' => 'Install water features', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Remote & Site Camps
['name' => 'Camp Manager', 'description' => 'Manage site accommodation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Catering Manager', 'description' => 'Manage site catering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Site Security Manager', 'description' => 'Manage site security', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Geotechnical & Foundations
['name' => 'Geotechnical Engineer', 'description' => 'Analyze soil conditions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Foundation Engineer', 'description' => 'Design foundations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pile Engineer', 'description' => 'Design pile foundations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Soil Testing Technician', 'description' => 'Test soil samples', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Rock Mechanic', 'description' => 'Analyze rock conditions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Surveying & Mapping
['name' => 'Land Surveyor', 'description' => 'Measure land', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quantity Surveyor', 'description' => 'Manage quantities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Topographic Surveyor', 'description' => 'Map terrain', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hydrographic Surveyor', 'description' => 'Map water bodies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GPS Surveyor', 'description' => 'Use GPS for surveying', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Drone Surveyor', 'description' => 'Use drones for surveying', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Building Information Modeling (BIM)
['name' => 'BIM Manager', 'description' => 'Manage BIM processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BIM Coordinator', 'description' => 'Coordinate BIM models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BIM Modeler - Architectural', 'description' => 'Create architectural BIM models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BIM Modeler - Structural', 'description' => 'Create structural BIM models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BIM Modeler - MEP', 'description' => 'Create MEP BIM models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => '4D BIM Specialist', 'description' => 'Add scheduling to BIM', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => '5D BIM Specialist', 'description' => 'Add cost to BIM', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'BIM Clash Detection Specialist', 'description' => 'Detect BIM clashes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Construction Technology
['name' => 'Construction Technology Manager', 'description' => 'Implement construction tech', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Construction Manager', 'description' => 'Lead digital construction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Software Specialist', 'description' => 'Manage construction software', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Drone Operations Manager', 'description' => 'Manage drone operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Robotics Construction Specialist', 'description' => 'Implement construction robotics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// ========== INDUSTRIAL POSITIONS ==========

// Industrial Engineering
['name' => 'Industrial Engineer', 'description' => 'Optimize industrial processes and systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Industrial Engineer', 'description' => 'Lead industrial engineering projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Industrial Engineer', 'description' => 'Assist in industrial engineering tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Improvement Engineer', 'description' => 'Improve manufacturing processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lean Manufacturing Engineer', 'description' => 'Implement lean manufacturing principles', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Six Sigma Black Belt', 'description' => 'Lead Six Sigma projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Six Sigma Green Belt', 'description' => 'Support Six Sigma projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Continuous Improvement Manager', 'description' => 'Drive continuous improvement culture', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Kaizen Facilitator', 'description' => 'Facilitate Kaizen events', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Work Study Engineer', 'description' => 'Conduct time and motion studies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Method Study Engineer', 'description' => 'Analyze and improve work methods', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Engineering Manager', 'description' => 'Lead industrial engineering department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Production & Manufacturing
['name' => 'Production Engineer', 'description' => 'Manage production operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Production Engineer', 'description' => 'Lead production engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Manager', 'description' => 'Lead production department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Production Manager', 'description' => 'Manage multiple production lines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Production Manager', 'description' => 'Support production management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Supervisor', 'description' => 'Supervise production shifts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shift Supervisor', 'description' => 'Manage production shift', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Planner', 'description' => 'Plan production schedules', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Production Planner', 'description' => 'Lead production planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Coordinator', 'description' => 'Coordinate production activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Manufacturing Engineer', 'description' => 'Design manufacturing processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Manufacturing Engineer', 'description' => 'Lead manufacturing engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Manufacturing Manager', 'description' => 'Lead manufacturing operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plant Manager', 'description' => 'Lead entire plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Factory Manager', 'description' => 'Manage factory operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Operations Manager - Industrial', 'description' => 'Manage industrial operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plant Superintendent', 'description' => 'Supervise plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Process Engineering
['name' => 'Process Engineer', 'description' => 'Design and optimize industrial processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Process Engineer', 'description' => 'Lead process engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Process Engineer', 'description' => 'Assist in process engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Process Engineer', 'description' => 'Design chemical processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Development Engineer', 'description' => 'Develop new processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Improvement Specialist', 'description' => 'Improve existing processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Safety Engineer', 'description' => 'Ensure process safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Control Engineer', 'description' => 'Design process control systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Quality Control & Assurance
['name' => 'Quality Control Engineer', 'description' => 'Inspect product quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Assurance Engineer', 'description' => 'Implement QA systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Quality Engineer', 'description' => 'Lead quality engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Manager', 'description' => 'Lead quality department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Inspector', 'description' => 'Inspect products and materials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Technician', 'description' => 'Perform quality tests', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'QA/QC Manager', 'description' => 'Manage QA/QC operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Auditor', 'description' => 'Conduct quality audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ISO Coordinator', 'description' => 'Manage ISO certification', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Total Quality Management Specialist', 'description' => 'Implement TQM', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Statistical Process Control Engineer', 'description' => 'Implement SPC', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Supply Chain & Logistics
['name' => 'Supply Chain Manager', 'description' => 'Manage supply chain operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Supply Chain Manager', 'description' => 'Lead supply chain strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Supply Chain Coordinator', 'description' => 'Coordinate supply chain', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Logistics Manager', 'description' => 'Manage logistics operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Logistics Coordinator', 'description' => 'Coordinate logistics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Warehouse Manager', 'description' => 'Manage warehouse operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Warehouse Supervisor', 'description' => 'Supervise warehouse staff', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inventory Manager', 'description' => 'Manage inventory levels', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inventory Controller', 'description' => 'Control inventory', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Materials Manager', 'description' => 'Manage materials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Store Keeper', 'description' => 'Manage stores', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Procurement Manager', 'description' => 'Manage procurement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Purchase Manager', 'description' => 'Manage purchasing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Purchase Officer', 'description' => 'Process purchases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sourcing Specialist', 'description' => 'Source suppliers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vendor Development Manager', 'description' => 'Develop vendors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Expeditor', 'description' => 'Expedite orders', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dispatch Coordinator', 'description' => 'Coordinate dispatches', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Maintenance & Reliability
['name' => 'Maintenance Engineer', 'description' => 'Maintain industrial equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Maintenance Engineer', 'description' => 'Lead maintenance team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Maintenance Manager', 'description' => 'Manage maintenance department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Reliability Engineer', 'description' => 'Improve equipment reliability', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Planned Maintenance Engineer', 'description' => 'Plan maintenance schedules', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Predictive Maintenance Engineer', 'description' => 'Implement predictive maintenance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Preventive Maintenance Engineer', 'description' => 'Implement preventive maintenance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Maintenance Supervisor', 'description' => 'Supervise maintenance staff', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mechanical Maintenance Engineer', 'description' => 'Maintain mechanical equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrical Maintenance Engineer', 'description' => 'Maintain electrical systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Instrumentation Maintenance Engineer', 'description' => 'Maintain instruments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Maintenance Technician', 'description' => 'Perform maintenance tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fitter', 'description' => 'Fit mechanical components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrician - Industrial', 'description' => 'Handle industrial electrical work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Millwright', 'description' => 'Install industrial machinery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tool Room Engineer', 'description' => 'Manage tool room', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tool Maker', 'description' => 'Make tools and dies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Automation & Robotics
['name' => 'Automation Engineer', 'description' => 'Implement industrial automation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Automation Engineer', 'description' => 'Lead automation projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Robotics Engineer', 'description' => 'Implement industrial robots', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PLC Programmer', 'description' => 'Program PLC controllers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SCADA Engineer', 'description' => 'Design SCADA systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'DCS Engineer', 'description' => 'Design DCS systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HMI Designer', 'description' => 'Design HMIs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Robotics Programmer', 'description' => 'Program industrial robots', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Automation Technician', 'description' => 'Maintain automation systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Instrumentation & Control
['name' => 'Instrumentation Engineer', 'description' => 'Design instrumentation systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Instrumentation Engineer', 'description' => 'Lead instrumentation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Control Systems Engineer', 'description' => 'Design control systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Instrumentation Technician', 'description' => 'Maintain instruments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Control Valve Engineer', 'description' => 'Specify control valves', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Measurement Engineer', 'description' => 'Design measurement systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// HSE & Safety
['name' => 'Safety Officer', 'description' => 'Ensure workplace safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Safety Officer', 'description' => 'Lead safety programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HSE Manager', 'description' => 'Manage HSE programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Safety Engineer', 'description' => 'Design safety systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Environmental Engineer', 'description' => 'Manage environmental compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fire Safety Officer', 'description' => 'Manage fire safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Safety Trainer', 'description' => 'Train employees on safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Production Planning & Control
['name' => 'Production Planning Engineer', 'description' => 'Plan production schedules', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PPC Manager', 'description' => 'Manage production planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Material Requirement Planner', 'description' => 'Plan material requirements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Capacity Planner', 'description' => 'Plan production capacity', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Controller', 'description' => 'Control production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shop Floor Controller', 'description' => 'Control shop floor', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Plant Operations
['name' => 'Plant Operator', 'description' => 'Operate plant equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Plant Operator', 'description' => 'Lead plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shift Operator', 'description' => 'Operate during shift', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Control Room Operator', 'description' => 'Operate control room', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Field Operator', 'description' => 'Operate field equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Forklift Operator', 'description' => 'Operate forklifts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Crane Operator', 'description' => 'Operate cranes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Technical Services
['name' => 'Technical Services Engineer', 'description' => 'Provide technical support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Application Engineer', 'description' => 'Support product applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Field Service Engineer', 'description' => 'Provide field service', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Support Engineer', 'description' => 'Support products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'After Sales Service Engineer', 'description' => 'Provide after-sales service', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Research & Development
['name' => 'R&D Engineer', 'description' => 'Conduct industrial research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior R&D Engineer', 'description' => 'Lead R&D projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Development Engineer', 'description' => 'Develop new products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Design Engineer', 'description' => 'Design industrial products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Prototype Engineer', 'description' => 'Build prototypes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Testing Engineer', 'description' => 'Test industrial products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Validation Engineer', 'description' => 'Validate products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Project Management
['name' => 'Project Engineer', 'description' => 'Manage industrial projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Project Engineer', 'description' => 'Lead industrial projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Manager - Industrial', 'description' => 'Manage industrial projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Coordinator', 'description' => 'Coordinate projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Controls Engineer', 'description' => 'Control project parameters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Planner', 'description' => 'Plan projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Industrial Sales & Marketing
['name' => 'Industrial Sales Engineer', 'description' => 'Sell industrial products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Sales Engineer', 'description' => 'Lead industrial sales', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'B2B Sales Manager', 'description' => 'Manage B2B sales', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Key Account Manager', 'description' => 'Manage key accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Development Manager', 'description' => 'Develop industrial business', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Marketing Manager', 'description' => 'Market industrial products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Manager - Industrial', 'description' => 'Manage industrial products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Skilled Manufacturing Workers
['name' => 'Machine Operator', 'description' => 'Operate industrial machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CNC Operator', 'description' => 'Operate CNC machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CNC Programmer', 'description' => 'Program CNC machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lathe Operator', 'description' => 'Operate lathe machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Milling Machine Operator', 'description' => 'Operate milling machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grinding Machine Operator', 'description' => 'Operate grinding machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Press Machine Operator', 'description' => 'Operate press machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Injection Molding Operator', 'description' => 'Operate injection molding machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Extrusion Operator', 'description' => 'Operate extrusion machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Packing Machine Operator', 'description' => 'Operate packing machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assembly Line Worker', 'description' => 'Work on assembly line', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Control Inspector', 'description' => 'Inspect product quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Worker', 'description' => 'Perform production tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'General Worker', 'description' => 'Perform general industrial tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Welding & Fabrication
['name' => 'Welder', 'description' => 'Perform welding', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Welder', 'description' => 'Lead welding team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fabricator', 'description' => 'Fabricate metal components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sheet Metal Worker', 'description' => 'Work with sheet metal', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fitter', 'description' => 'Fit metal components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Structural Fabricator', 'description' => 'Fabricate structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pipe Fitter', 'description' => 'Fit pipes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Chemical & Pharmaceutical Industry
['name' => 'Chemical Engineer', 'description' => 'Design chemical processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pharmaceutical Engineer', 'description' => 'Design pharma processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Biotech Engineer', 'description' => 'Work with biotech processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Chemist', 'description' => 'Manage chemical production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Control Chemist', 'description' => 'Test chemical quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Research Chemist', 'description' => 'Conduct chemical research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Food & Beverage Industry
['name' => 'Food Technologist', 'description' => 'Develop food products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Food Processing Engineer', 'description' => 'Design food processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Assurance - Food', 'description' => 'Ensure food quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Supervisor - Food', 'description' => 'Supervise food production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Beverage Processing Engineer', 'description' => 'Process beverages', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Textile Industry
['name' => 'Textile Engineer', 'description' => 'Design textile processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Manager - Textile', 'description' => 'Manage textile production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Control - Textile', 'description' => 'Inspect textile quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Textile Designer', 'description' => 'Design textiles', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Spinning Master', 'description' => 'Manage spinning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Weaving Master', 'description' => 'Manage weaving', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dyeing Master', 'description' => 'Manage dyeing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Printing Master', 'description' => 'Manage printing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Automotive Industry
['name' => 'Automotive Engineer', 'description' => 'Design automotive components', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assembly Line Supervisor', 'description' => 'Supervise assembly line', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Engineer - Automotive', 'description' => 'Ensure auto quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Supervisor - Automotive', 'description' => 'Supervise auto production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Paint Shop Supervisor', 'description' => 'Supervise painting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Body Shop Supervisor', 'description' => 'Supervise body shop', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Electronics Industry
['name' => 'Electronics Engineer', 'description' => 'Design electronics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SMT Engineer', 'description' => 'Manage SMT production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PCB Assembly Engineer', 'description' => 'Assemble PCBs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Inspector - Electronics', 'description' => 'Inspect electronics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Testing Engineer - Electronics', 'description' => 'Test electronics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Packaging Industry
['name' => 'Packaging Engineer', 'description' => 'Design packaging', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Packaging Development Manager', 'description' => 'Develop packaging', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Packaging Machine Operator', 'description' => 'Operate packaging machines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Control - Packaging', 'description' => 'Inspect packaging', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Printing Industry
['name' => 'Printing Engineer', 'description' => 'Manage printing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Printing Press Operator', 'description' => 'Operate printing press', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Color Management Specialist', 'description' => 'Manage color quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Printing Supervisor', 'description' => 'Supervise printing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Rubber & Plastic Industry
['name' => 'Rubber Technologist', 'description' => 'Develop rubber products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plastic Engineer', 'description' => 'Design plastic products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Injection Molding Engineer', 'description' => 'Manage injection molding', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Extrusion Engineer', 'description' => 'Manage extrusion', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Blow Molding Engineer', 'description' => 'Manage blow molding', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Metal & Foundry Industry
['name' => 'Metallurgical Engineer', 'description' => 'Work with metals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Foundry Engineer', 'description' => 'Manage foundry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Heat Treatment Engineer', 'description' => 'Manage heat treatment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Forging Engineer', 'description' => 'Manage forging', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Casting Engineer', 'description' => 'Manage casting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Metal Finishing Engineer', 'description' => 'Finish metal products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Wood & Furniture Industry
['name' => 'Wood Technologist', 'description' => 'Work with wood', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Furniture Designer', 'description' => 'Design furniture', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CNC Woodworker', 'description' => 'Operate CNC woodworking', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cabinet Maker', 'description' => 'Make cabinets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Cement & Construction Materials
['name' => 'Cement Engineer', 'description' => 'Manage cement production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Kiln Engineer', 'description' => 'Manage kiln operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grinding Engineer', 'description' => 'Manage grinding', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Control - Cement', 'description' => 'Test cement quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Glass & Ceramics Industry
['name' => 'Glass Technologist', 'description' => 'Work with glass', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Ceramic Engineer', 'description' => 'Work with ceramics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Furnace Engineer', 'description' => 'Manage furnaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Inspector - Glass', 'description' => 'Inspect glass quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Training & Education
['name' => 'Industrial Trainer', 'description' => 'Train industrial staff', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Technical Trainer', 'description' => 'Provide technical training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Apprentice Coordinator', 'description' => 'Manage apprentices', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Skills Development Officer', 'description' => 'Develop skills', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level
['name' => 'Graduate Engineer Trainee - Industrial', 'description' => 'Training for industrial graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Trainee', 'description' => 'Industrial training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Management Trainee - Industrial', 'description' => 'Management training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Apprentice - Industrial', 'description' => 'Industrial apprenticeship', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Engineer - Industrial', 'description' => 'Entry-level industrial engineer', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// ========== LEGAL POSITIONS ==========

// Core Legal Positions
['name' => 'Lawyer', 'description' => 'Provide legal advice and representation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Attorney', 'description' => 'Practice law and represent clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Advocate', 'description' => 'Represent clients in court', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Advisor', 'description' => 'Provide legal guidance to organizations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Consultant', 'description' => 'Consult on legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Counsel', 'description' => 'Provide in-house legal advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Legal Counsel', 'description' => 'Lead legal advisory services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Associate Lawyer', 'description' => 'Work under senior lawyers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Lawyer', 'description' => 'Entry-level legal position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Corporate Law
['name' => 'Corporate Lawyer', 'description' => 'Handle corporate legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Corporate Lawyer', 'description' => 'Lead corporate legal affairs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Counsel', 'description' => 'Provide in-house corporate legal advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mergers & Acquisitions Lawyer', 'description' => 'Handle M&A legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Governance Specialist', 'description' => 'Ensure corporate governance compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Joint Venture Lawyer', 'description' => 'Handle joint venture agreements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Restructuring Lawyer', 'description' => 'Handle corporate restructuring', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Company Secretary
['name' => 'Company Secretary (CS)', 'description' => 'Ensure legal and regulatory compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Company Secretary', 'description' => 'Lead company secretarial functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Company Secretary', 'description' => 'Support company secretary', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Deputy Company Secretary', 'description' => 'Deputy to company secretary', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Board Secretary', 'description' => 'Manage board meeting documentation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compliance Secretary', 'description' => 'Handle compliance secretarial work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Litigation & Dispute Resolution
['name' => 'Litigation Lawyer', 'description' => 'Handle court cases and litigation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Litigation Lawyer', 'description' => 'Lead litigation cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trial Lawyer', 'description' => 'Represent clients in trials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dispute Resolution Lawyer', 'description' => 'Resolve legal disputes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Arbitration Lawyer', 'description' => 'Handle arbitration cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mediator', 'description' => 'Mediate legal disputes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Conciliator', 'description' => 'Conciliate disputes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Courtroom Advocate', 'description' => 'Argue cases in court', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Criminal Law
['name' => 'Criminal Lawyer', 'description' => 'Handle criminal cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Defense Attorney', 'description' => 'Defend accused persons', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Prosecutor', 'description' => 'Prosecute criminal cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Public Prosecutor', 'description' => 'Represent state in criminal cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Criminal Defense Lawyer', 'description' => 'Defend criminal clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'White Collar Crime Lawyer', 'description' => 'Handle white collar crimes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cyber Crime Lawyer', 'description' => 'Handle cyber crime cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Civil Law
['name' => 'Civil Lawyer', 'description' => 'Handle civil cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Civil Litigation Lawyer', 'description' => 'Handle civil litigation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Property Lawyer', 'description' => 'Handle property legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Contract Lawyer', 'description' => 'Handle contract legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tort Lawyer', 'description' => 'Handle tort cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Family Law
['name' => 'Family Lawyer', 'description' => 'Handle family law matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Divorce Lawyer', 'description' => 'Handle divorce cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Child Custody Lawyer', 'description' => 'Handle child custody cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Matrimonial Lawyer', 'description' => 'Handle matrimonial disputes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Domestic Violence Lawyer', 'description' => 'Handle domestic violence cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Adoption Lawyer', 'description' => 'Handle adoption legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Guardianship Lawyer', 'description' => 'Handle guardianship matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Real Estate & Property Law
['name' => 'Real Estate Lawyer', 'description' => 'Handle real estate legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Property Lawyer', 'description' => 'Handle property legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Land Acquisition Lawyer', 'description' => 'Handle land acquisition', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Title Search Lawyer', 'description' => 'Search property titles', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lease Lawyer', 'description' => 'Handle lease agreements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mortgage Lawyer', 'description' => 'Handle mortgage legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Real Estate Transaction Lawyer', 'description' => 'Handle property transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Intellectual Property Law
['name' => 'Intellectual Property Lawyer', 'description' => 'Handle IP legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Patent Attorney', 'description' => 'Handle patent filings and disputes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trademark Lawyer', 'description' => 'Handle trademark registration', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Copyright Lawyer', 'description' => 'Handle copyright matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trade Secret Lawyer', 'description' => 'Protect trade secrets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IP Litigation Lawyer', 'description' => 'Handle IP litigation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Patent Examiner', 'description' => 'Examine patent applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trademark Examiner', 'description' => 'Examine trademark applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Labor & Employment Law
['name' => 'Labor Lawyer', 'description' => 'Handle labor law matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Employment Lawyer', 'description' => 'Handle employment legal issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Relations Lawyer', 'description' => 'Handle industrial relations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Workplace Harassment Lawyer', 'description' => 'Handle harassment cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Wrongful Termination Lawyer', 'description' => 'Handle termination cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Employment Contract Lawyer', 'description' => 'Draft employment contracts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Tax Law
['name' => 'Tax Lawyer', 'description' => 'Handle tax legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Income Tax Lawyer', 'description' => 'Handle income tax cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GST Lawyer', 'description' => 'Handle GST legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Tax Lawyer', 'description' => 'Handle corporate tax', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'International Tax Lawyer', 'description' => 'Handle international tax', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Transfer Pricing Lawyer', 'description' => 'Handle transfer pricing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Litigation Lawyer', 'description' => 'Handle tax disputes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Banking & Finance Law
['name' => 'Banking Lawyer', 'description' => 'Handle banking legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Lawyer', 'description' => 'Handle finance legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Securities Lawyer', 'description' => 'Handle securities law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Regulatory Lawyer', 'description' => 'Handle financial regulations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Loan Documentation Lawyer', 'description' => 'Draft loan documents', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Debt Recovery Lawyer', 'description' => 'Handle debt recovery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insolvency Lawyer', 'description' => 'Handle insolvency matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bankruptcy Lawyer', 'description' => 'Handle bankruptcy cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// International Law
['name' => 'International Lawyer', 'description' => 'Handle international legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'International Trade Lawyer', 'description' => 'Handle international trade', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cross Border Transaction Lawyer', 'description' => 'Handle cross-border deals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'International Arbitration Lawyer', 'description' => 'Handle international arbitration', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Foreign Investment Lawyer', 'description' => 'Handle foreign investment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Constitutional Law
['name' => 'Constitutional Lawyer', 'description' => 'Handle constitutional matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Human Rights Lawyer', 'description' => 'Handle human rights cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Public Interest Lawyer', 'description' => 'Handle PIL cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Civil Rights Lawyer', 'description' => 'Protect civil rights', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Environmental Law
['name' => 'Environmental Lawyer', 'description' => 'Handle environmental legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Climate Change Lawyer', 'description' => 'Handle climate change law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pollution Control Lawyer', 'description' => 'Handle pollution cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Environmental Compliance Lawyer', 'description' => 'Ensure environmental compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Healthcare Law
['name' => 'Healthcare Lawyer', 'description' => 'Handle healthcare legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Medical Malpractice Lawyer', 'description' => 'Handle medical malpractice cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pharmaceutical Lawyer', 'description' => 'Handle pharmaceutical law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bioethics Lawyer', 'description' => 'Handle bioethics issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Technology & Cyber Law
['name' => 'Technology Lawyer', 'description' => 'Handle technology legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cyber Lawyer', 'description' => 'Handle cyber legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Data Privacy Lawyer', 'description' => 'Handle data privacy compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GDPR Compliance Lawyer', 'description' => 'Ensure GDPR compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'E-commerce Lawyer', 'description' => 'Handle e-commerce legal issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Software Licensing Lawyer', 'description' => 'Handle software licensing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'AI Ethics Lawyer', 'description' => 'Handle AI legal ethics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Media & Entertainment Law
['name' => 'Media Lawyer', 'description' => 'Handle media legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Entertainment Lawyer', 'description' => 'Handle entertainment law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sports Lawyer', 'description' => 'Handle sports legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Film Lawyer', 'description' => 'Handle film legal issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Music Lawyer', 'description' => 'Handle music legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Gaming Lawyer', 'description' => 'Handle gaming law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Insurance Law
['name' => 'Insurance Lawyer', 'description' => 'Handle insurance legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Claims Lawyer', 'description' => 'Handle insurance claims', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Policy Coverage Lawyer', 'description' => 'Handle policy coverage issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Reinsurance Lawyer', 'description' => 'Handle reinsurance matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Energy & Natural Resources Law
['name' => 'Energy Lawyer', 'description' => 'Handle energy legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Oil & Gas Lawyer', 'description' => 'Handle oil and gas law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Renewable Energy Lawyer', 'description' => 'Handle renewable energy law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mining Lawyer', 'description' => 'Handle mining legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Natural Resources Lawyer', 'description' => 'Handle natural resources law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Construction Law
['name' => 'Construction Lawyer', 'description' => 'Handle construction legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Infrastructure Lawyer', 'description' => 'Handle infrastructure projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Contract Lawyer', 'description' => 'Draft construction contracts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Construction Dispute Lawyer', 'description' => 'Handle construction disputes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Immigration Law
['name' => 'Immigration Lawyer', 'description' => 'Handle immigration legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Visa Lawyer', 'description' => 'Handle visa applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Citizenship Lawyer', 'description' => 'Handle citizenship matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Deportation Defense Lawyer', 'description' => 'Defend against deportation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Work Permit Lawyer', 'description' => 'Handle work permits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Legal Support & Paralegal
['name' => 'Paralegal', 'description' => 'Support legal professionals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Paralegal', 'description' => 'Lead paralegal team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Assistant', 'description' => 'Assist lawyers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Secretary', 'description' => 'Provide legal secretarial support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Executive', 'description' => 'Handle legal executive tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Clerk', 'description' => 'Perform legal clerical work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Law Clerk', 'description' => 'Assist judges or lawyers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Researcher', 'description' => 'Conduct legal research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Legal Researcher', 'description' => 'Lead legal research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Analyst', 'description' => 'Analyze legal issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Associate', 'description' => 'Work as legal associate', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Legal Associate', 'description' => 'Entry-level legal associate', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Legal Associate', 'description' => 'Lead legal associate', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Document Review & Management
['name' => 'Document Review Lawyer', 'description' => 'Review legal documents', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Document Specialist', 'description' => 'Specialize in legal docs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Contract Manager', 'description' => 'Manage contracts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Contract Specialist', 'description' => 'Handle contract matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Drafting Specialist', 'description' => 'Draft legal documents', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Editor', 'description' => 'Edit legal content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Compliance & Regulatory
['name' => 'Compliance Officer', 'description' => 'Ensure legal compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Compliance Officer', 'description' => 'Lead compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compliance Manager', 'description' => 'Manage compliance department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regulatory Compliance Officer', 'description' => 'Handle regulatory compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'AML Compliance Officer', 'description' => 'Handle anti-money laundering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'KYC Analyst', 'description' => 'Handle KYC compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regulatory Affairs Manager', 'description' => 'Manage regulatory affairs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Court & Judicial Positions
['name' => 'Judge', 'description' => 'Preside over court proceedings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Magistrate', 'description' => 'Handle minor cases', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'District Judge', 'description' => 'Preside over district court', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'High Court Judge', 'description' => 'Preside over high court', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Supreme Court Judge', 'description' => 'Preside over supreme court', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tribunal Member', 'description' => 'Serve on tribunal', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Judicial Clerk', 'description' => 'Assist judges', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Court Reporter', 'description' => 'Record court proceedings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bailiff', 'description' => 'Maintain court order', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Server', 'description' => 'Serve legal documents', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Government Legal Positions
['name' => 'Government Lawyer', 'description' => 'Work for government', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Public Defender', 'description' => 'Defend indigent clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Aid Lawyer', 'description' => 'Provide legal aid', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Attorney General', 'description' => 'Chief legal officer of state', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Solicitor General', 'description' => 'Assist attorney general', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Advocate General', 'description' => 'State legal advisor', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Advisor to Government', 'description' => 'Advise government', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Academic & Legal Education
['name' => 'Law Professor', 'description' => 'Teach law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Law Professor', 'description' => 'Lead law department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Law Professor', 'description' => 'Assistant professor of law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Associate Law Professor', 'description' => 'Associate professor of law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dean - Law School', 'description' => 'Lead law school', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Educator', 'description' => 'Educate in legal field', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Moot Court Coach', 'description' => 'Coach moot court', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Legal Writing Instructor', 'description' => 'Teach legal writing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// In-House Legal
['name' => 'In-House Counsel', 'description' => 'Work in corporate legal department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'General Counsel', 'description' => 'Lead corporate legal department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Associate General Counsel', 'description' => 'Assist general counsel', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// ========== FINANCIAL POSITIONS ==========

// Core Finance & Accounting
['name' => 'Accountant', 'description' => 'Manage financial records and transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Accountant', 'description' => 'Handle complex accounting tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Accountant', 'description' => 'Assist in accounting operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounts Assistant', 'description' => 'Support accounting team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounts Executive', 'description' => 'Execute accounting tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Executive', 'description' => 'Handle finance operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Associate', 'description' => 'Support finance team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Manager', 'description' => 'Manage finance department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Finance Manager', 'description' => 'Lead finance operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Director', 'description' => 'Direct finance strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Financial Officer (CFO)', 'description' => 'Lead financial strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Accounts Payable & Receivable
['name' => 'Accounts Payable Specialist', 'description' => 'Manage vendor payments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounts Receivable Specialist', 'description' => 'Manage customer collections', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounts Payable Manager', 'description' => 'Lead AP department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounts Receivable Manager', 'description' => 'Lead AR department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Billing Specialist', 'description' => 'Process invoices', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Billing Manager', 'description' => 'Manage billing operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Collections Officer', 'description' => 'Collect outstanding payments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Collections Manager', 'description' => 'Lead collections team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// General Ledger & Reporting
['name' => 'General Ledger Accountant', 'description' => 'Maintain GL accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GL Manager', 'description' => 'Manage general ledger', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Reporting Analyst', 'description' => 'Prepare financial reports', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Reporting Manager', 'description' => 'Lead financial reporting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Consolidation Accountant', 'description' => 'Handle financial consolidation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Controller', 'description' => 'Oversee financial controls', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Group Finance Manager', 'description' => 'Manage group finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Financial Planning & Analysis (FP&A)
['name' => 'Financial Analyst', 'description' => 'Analyze financial data', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Financial Analyst', 'description' => 'Lead financial analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'FP&A Analyst', 'description' => 'Handle financial planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior FP&A Analyst', 'description' => 'Lead FP&A activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'FP&A Manager', 'description' => 'Manage financial planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Budget Analyst', 'description' => 'Prepare and monitor budgets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Budget Manager', 'description' => 'Lead budgeting process', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Forecasting Analyst', 'description' => 'Prepare financial forecasts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Variance Analyst', 'description' => 'Analyze budget variances', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Cost Accounting
['name' => 'Cost Accountant', 'description' => 'Analyze product costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Cost Accountant', 'description' => 'Lead cost accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cost Analyst', 'description' => 'Analyze cost structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cost Manager', 'description' => 'Manage cost department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Cost Accountant', 'description' => 'Track project costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Manufacturing Accountant', 'description' => 'Handle manufacturing costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Management Accounting
['name' => 'Management Accountant', 'description' => 'Provide management reports', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Management Accountant', 'description' => 'Lead management accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Management Accounting Manager', 'description' => 'Manage MA department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Analyst - Finance', 'description' => 'Analyze business finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Commercial Finance Analyst', 'description' => 'Handle commercial finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Tax
['name' => 'Tax Accountant', 'description' => 'Prepare tax returns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Tax Accountant', 'description' => 'Lead tax accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Analyst', 'description' => 'Analyze tax issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Consultant', 'description' => 'Provide tax advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Manager', 'description' => 'Manage tax department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Director', 'description' => 'Lead tax strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'International Tax Manager', 'description' => 'Handle international tax', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Transfer Pricing Specialist', 'description' => 'Handle transfer pricing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GST/VAT Specialist', 'description' => 'Handle indirect tax', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Income Tax Specialist', 'description' => 'Handle income tax', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Compliance Officer', 'description' => 'Ensure tax compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Planning Specialist', 'description' => 'Plan tax strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Audit
['name' => 'Internal Auditor', 'description' => 'Conduct internal audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Internal Auditor', 'description' => 'Lead internal audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'External Auditor', 'description' => 'Conduct external audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior External Auditor', 'description' => 'Lead external audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Audit Manager', 'description' => 'Manage audit team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Audit Manager', 'description' => 'Lead audit department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Internal Audit Head', 'description' => 'Lead internal audit', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compliance Auditor', 'description' => 'Audit compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IT Auditor', 'description' => 'Audit IT systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Operational Auditor', 'description' => 'Audit operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Forensic Auditor', 'description' => 'Investigate financial fraud', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Audit Associate', 'description' => 'Assist in audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Treasury
['name' => 'Treasury Analyst', 'description' => 'Analyze treasury operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Treasury Analyst', 'description' => 'Lead treasury analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Treasury Manager', 'description' => 'Manage treasury operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Treasury Manager', 'description' => 'Lead treasury department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cash Manager', 'description' => 'Manage cash flow', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Liquidity Manager', 'description' => 'Manage liquidity', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cash Flow Analyst', 'description' => 'Analyze cash flow', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Treasury Operations Specialist', 'description' => 'Handle treasury ops', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Investment Manager', 'description' => 'Manage investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Portfolio Manager', 'description' => 'Manage portfolios', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Manager - Treasury', 'description' => 'Manage treasury risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Payroll
['name' => 'Payroll Specialist', 'description' => 'Process payroll', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Payroll Specialist', 'description' => 'Lead payroll processing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Payroll Manager', 'description' => 'Manage payroll department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Payroll Administrator', 'description' => 'Administer payroll', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Payroll Analyst', 'description' => 'Analyze payroll data', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compensation Analyst', 'description' => 'Analyze compensation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Benefits Administrator', 'description' => 'Manage benefits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Credit & Risk
['name' => 'Credit Analyst', 'description' => 'Analyze creditworthiness', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Credit Analyst', 'description' => 'Lead credit analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Credit Manager', 'description' => 'Manage credit department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Credit Controller', 'description' => 'Control credit risk', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Analyst', 'description' => 'Analyze financial risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Risk Analyst', 'description' => 'Lead risk analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Manager', 'description' => 'Manage risk department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Credit Risk Manager', 'description' => 'Manage credit risk', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Market Risk Analyst', 'description' => 'Analyze market risk', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Operational Risk Manager', 'description' => 'Manage operational risk', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Enterprise Risk Manager', 'description' => 'Manage enterprise risk', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Investment Banking
['name' => 'Investment Banking Analyst', 'description' => 'Analyze investment banking deals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Investment Banking Associate', 'description' => 'Assist in IB deals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Investment Banking Manager', 'description' => 'Manage IB deals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'M&A Analyst', 'description' => 'Analyze mergers & acquisitions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'M&A Associate', 'description' => 'Assist in M&A deals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'M&A Manager', 'description' => 'Manage M&A transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Equity Research Analyst', 'description' => 'Research equity markets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Equity Research Associate', 'description' => 'Assist equity research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Investment Research Analyst', 'description' => 'Analyze investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Deal Origination Specialist', 'description' => 'Source investment deals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Corporate Finance
['name' => 'Corporate Finance Analyst', 'description' => 'Analyze corporate finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Finance Manager', 'description' => 'Manage corporate finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Finance Associate', 'description' => 'Assist corporate finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Capital Budgeting Analyst', 'description' => 'Analyze capital budgets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Capital Markets Analyst', 'description' => 'Analyze capital markets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Capital Markets Manager', 'description' => 'Manage capital markets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Debt Financing Specialist', 'description' => 'Arrange debt financing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Equity Financing Specialist', 'description' => 'Arrange equity financing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Structured Finance Analyst', 'description' => 'Analyze structured finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Finance Analyst', 'description' => 'Analyze project finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Finance Manager', 'description' => 'Manage project finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Private Equity & Venture Capital
['name' => 'Private Equity Analyst', 'description' => 'Analyze PE investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Private Equity Associate', 'description' => 'Assist PE investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Private Equity Manager', 'description' => 'Manage PE investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Venture Capital Analyst', 'description' => 'Analyze VC investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Venture Capital Associate', 'description' => 'Assist VC investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Venture Capital Manager', 'description' => 'Manage VC investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fund Manager', 'description' => 'Manage investment funds', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hedge Fund Analyst', 'description' => 'Analyze hedge funds', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mutual Fund Analyst', 'description' => 'Analyze mutual funds', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Wealth Management & Financial Advisory
['name' => 'Wealth Manager', 'description' => 'Manage client wealth', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Wealth Manager', 'description' => 'Lead wealth management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Advisor', 'description' => 'Provide financial advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Financial Advisor', 'description' => 'Lead financial advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Investment Advisor', 'description' => 'Advise on investments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Relationship Manager - Wealth', 'description' => 'Manage HNI relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Private Banker', 'description' => 'Serve private banking clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Planner', 'description' => 'Create financial plans', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Estate Planner', 'description' => 'Plan estates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Retirement Planner', 'description' => 'Plan retirement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Banking
['name' => 'Bank Teller', 'description' => 'Process bank transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Teller', 'description' => 'Lead teller operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Branch Manager - Banking', 'description' => 'Manage bank branch', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Branch Manager', 'description' => 'Assist branch manager', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Relationship Manager - Corporate', 'description' => 'Manage corporate clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Relationship Manager - SME', 'description' => 'Manage SME clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Relationship Manager - Retail', 'description' => 'Manage retail clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Loan Officer', 'description' => 'Process loan applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Credit Officer', 'description' => 'Assess credit applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mortgage Specialist', 'description' => 'Handle mortgages', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trade Finance Specialist', 'description' => 'Handle trade finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Foreign Exchange Dealer', 'description' => 'Trade foreign exchange', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Treasury Dealer', 'description' => 'Deal in treasury', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Banking Operations Manager', 'description' => 'Manage bank ops', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Customer Service Representative - Bank', 'description' => 'Serve bank customers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Insurance
['name' => 'Insurance Agent', 'description' => 'Sell insurance policies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insurance Advisor', 'description' => 'Advise on insurance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Underwriter', 'description' => 'Evaluate insurance risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Underwriter', 'description' => 'Lead underwriting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Claims Adjuster', 'description' => 'Process insurance claims', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Claims Manager', 'description' => 'Manage claims department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Actuary', 'description' => 'Analyze insurance risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insurance Operations Manager', 'description' => 'Manage insurance ops', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Reinsurance Specialist', 'description' => 'Handle reinsurance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Real Estate Finance
['name' => 'Real Estate Finance Analyst', 'description' => 'Analyze real estate finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Real Estate Finance Manager', 'description' => 'Manage real estate finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mortgage Underwriter', 'description' => 'Underwrite mortgages', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mortgage Broker', 'description' => 'Arrange mortgages', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Property Valuer', 'description' => 'Value properties', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Financial Services
['name' => 'Financial Services Representative', 'description' => 'Sell financial products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Services Manager', 'description' => 'Manage financial services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Client Relationship Manager', 'description' => 'Manage client relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Customer Service - Finance', 'description' => 'Serve finance customers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Fintech & Digital Finance
['name' => 'Fintech Analyst', 'description' => 'Analyze fintech trends', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Payments Specialist', 'description' => 'Handle digital payments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cryptocurrency Analyst', 'description' => 'Analyze cryptocurrency', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Blockchain Finance Analyst', 'description' => 'Analyze blockchain finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mobile Payments Manager', 'description' => 'Manage mobile payments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Quantitative Finance
['name' => 'Quantitative Analyst (Quant)', 'description' => 'Apply quantitative methods', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Quantitative Analyst', 'description' => 'Lead quant analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quantitative Developer', 'description' => 'Develop quant models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Derivatives Analyst', 'description' => 'Analyze derivatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Derivatives Trader', 'description' => 'Trade derivatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Engineer', 'description' => 'Engineer financial products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Modeling Analyst', 'description' => 'Build risk models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Algorithmic Trader', 'description' => 'Execute algorithmic trades', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Financial Modeling & Valuation
['name' => 'Financial Modeler', 'description' => 'Build financial models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Financial Modeler', 'description' => 'Lead financial modeling', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Valuation Analyst', 'description' => 'Perform valuations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Valuation Analyst', 'description' => 'Lead valuations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Valuator', 'description' => 'Value businesses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Accounting Operations
['name' => 'Accounting Manager', 'description' => 'Manage accounting team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Accounting Manager', 'description' => 'Lead accounting department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounting Supervisor', 'description' => 'Supervise accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bookkeeper', 'description' => 'Maintain financial books', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Bookkeeper', 'description' => 'Lead bookkeeping', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounting Clerk', 'description' => 'Perform accounting clerical', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Clerk', 'description' => 'Perform finance clerical', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Financial Systems & ERP
['name' => 'Financial Systems Analyst', 'description' => 'Analyze financial systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ERP Finance Specialist', 'description' => 'Specialize in ERP finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SAP FICO Consultant', 'description' => 'Implement SAP FICO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Oracle Financials Consultant', 'description' => 'Implement Oracle Financials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Systems Manager', 'description' => 'Manage financial systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Compliance & Regulatory
['name' => 'Finance Compliance Officer', 'description' => 'Ensure finance compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regulatory Reporting Analyst', 'description' => 'Prepare regulatory reports', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Basel Compliance Specialist', 'description' => 'Handle Basel compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IFRS Specialist', 'description' => 'Implement IFRS', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GAAP Specialist', 'description' => 'Implement GAAP', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SOX Compliance Analyst', 'description' => 'Handle SOX compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Financial Transformation
['name' => 'Finance Transformation Manager', 'description' => 'Lead finance transformation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shared Service Center Manager', 'description' => 'Manage finance SSC', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Process Improvement Specialist', 'description' => 'Improve finance processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Automation Specialist', 'description' => 'Automate finance tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level Finance
['name' => 'Finance Intern', 'description' => 'Internship in finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounting Intern', 'description' => 'Internship in accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Graduate Trainee - Finance', 'description' => 'Training for finance graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Fresher', 'description' => 'Entry-level finance position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounting Fresher', 'description' => 'Entry-level accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Management Trainee - Finance', 'description' => 'Management training finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Finance Shared Services
['name' => 'Finance Shared Services Analyst', 'description' => 'Work in finance SSC', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance SSC Manager', 'description' => 'Manage finance SSC', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Record to Report Specialist', 'description' => 'Handle R2R process', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Order to Cash Specialist', 'description' => 'Handle O2C process', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Procure to Pay Specialist', 'description' => 'Handle P2P process', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CFO & Executive Support
['name' => 'Executive Assistant to CFO', 'description' => 'Support CFO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Business Partner', 'description' => 'Partner with business units', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Finance Business Partner', 'description' => 'Lead finance partnership', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Project Manager', 'description' => 'Manage finance projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// ========== SCHOOL POSITIONS ==========

// School Leadership & Administration
['name' => 'School Principal', 'description' => 'Lead overall school operations and academics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vice Principal', 'description' => 'Assist principal in school management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Head of School', 'description' => 'Lead school vision and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Academic Director', 'description' => 'Direct academic programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'School Administrator', 'description' => 'Manage school administration', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Administrator', 'description' => 'Lead administrative operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dean of Academics', 'description' => 'Oversee academic programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dean of Students', 'description' => 'Manage student affairs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Head of Department', 'description' => 'Lead specific academic department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Curriculum Coordinator', 'description' => 'Coordinate curriculum development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Academic Coordinator', 'description' => 'Coordinate academic activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Section Coordinator', 'description' => 'Coordinate specific grade sections', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Teaching Staff - Primary School
['name' => 'Primary School Teacher', 'description' => 'Teach primary school students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Class Teacher', 'description' => 'Manage classroom and teach multiple subjects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 1 Teacher', 'description' => 'Teach grade 1 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 2 Teacher', 'description' => 'Teach grade 2 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 3 Teacher', 'description' => 'Teach grade 3 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 4 Teacher', 'description' => 'Teach grade 4 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 5 Teacher', 'description' => 'Teach grade 5 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Elementary School Teacher', 'description' => 'Teach elementary grades', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Montessori Teacher', 'description' => 'Teach using Montessori method', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Kindergarten Teacher', 'description' => 'Teach kindergarten students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Nursery Teacher', 'description' => 'Teach nursery students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pre-Primary Teacher', 'description' => 'Teach pre-primary students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Early Childhood Educator', 'description' => 'Educate early childhood students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Teaching Staff - Middle School
['name' => 'Middle School Teacher', 'description' => 'Teach middle school students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 6 Teacher', 'description' => 'Teach grade 6 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 7 Teacher', 'description' => 'Teach grade 7 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 8 Teacher', 'description' => 'Teach grade 8 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Homeroom Teacher', 'description' => 'Manage homeroom activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Teaching Staff - High School
['name' => 'High School Teacher', 'description' => 'Teach high school students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 9 Teacher', 'description' => 'Teach grade 9 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 10 Teacher', 'description' => 'Teach grade 10 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 11 Teacher', 'description' => 'Teach grade 11 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Grade 12 Teacher', 'description' => 'Teach grade 12 students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Secondary Teacher', 'description' => 'Teach senior secondary classes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Subject Matter Expert', 'description' => 'Expert in specific subject', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Subject-Specific Teachers
['name' => 'English Teacher', 'description' => 'Teach English language and literature', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior English Teacher', 'description' => 'Lead English department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mathematics Teacher', 'description' => 'Teach mathematics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Math Teacher', 'description' => 'Lead mathematics department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Science Teacher', 'description' => 'Teach general science', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Physics Teacher', 'description' => 'Teach physics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemistry Teacher', 'description' => 'Teach chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Biology Teacher', 'description' => 'Teach biology', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Studies Teacher', 'description' => 'Teach social studies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'History Teacher', 'description' => 'Teach history', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Geography Teacher', 'description' => 'Teach geography', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Civics Teacher', 'description' => 'Teach civics/political science', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Economics Teacher', 'description' => 'Teach economics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Commerce Teacher', 'description' => 'Teach commerce subjects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accountancy Teacher', 'description' => 'Teach accountancy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Studies Teacher', 'description' => 'Teach business studies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Computer Science Teacher', 'description' => 'Teach computer science', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IT Teacher', 'description' => 'Teach information technology', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hindi Teacher', 'description' => 'Teach Hindi language', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sanskrit Teacher', 'description' => 'Teach Sanskrit language', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'French Teacher', 'description' => 'Teach French language', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'German Teacher', 'description' => 'Teach German language', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Spanish Teacher', 'description' => 'Teach Spanish language', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Language Teacher', 'description' => 'Teach regional languages', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Environmental Studies Teacher', 'description' => 'Teach environmental studies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Moral Science Teacher', 'description' => 'Teach moral science/values', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Co-Curricular Teachers
['name' => 'Physical Education Teacher', 'description' => 'Teach physical education', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sports Teacher', 'description' => 'Teach sports', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PE Instructor', 'description' => 'Conduct physical education', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Yoga Teacher', 'description' => 'Teach yoga', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Art Teacher', 'description' => 'Teach art and craft', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Drawing Teacher', 'description' => 'Teach drawing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Painting Teacher', 'description' => 'Teach painting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Music Teacher', 'description' => 'Teach music', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Vocal Music Teacher', 'description' => 'Teach vocal music', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Instrumental Music Teacher', 'description' => 'Teach instrumental music', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Dance Teacher', 'description' => 'Teach dance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Drama Teacher', 'description' => 'Teach drama and theatre', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Theatre Teacher', 'description' => 'Teach theatre arts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Special Education
['name' => 'Special Education Teacher', 'description' => 'Teach students with special needs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Special Educator', 'description' => 'Provide special education', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Learning Support Teacher', 'description' => 'Support students with learning difficulties', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inclusive Education Coordinator', 'description' => 'Coordinate inclusive education', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Resource Teacher', 'description' => 'Provide resource support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Remedial Teacher', 'description' => 'Provide remedial teaching', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shadow Teacher', 'description' => 'Support special needs students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Counseling & Student Support
['name' => 'School Counselor', 'description' => 'Provide counseling to students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Career Counselor', 'description' => 'Guide students on careers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Guidance Counselor', 'description' => 'Provide guidance services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Student Counselor', 'description' => 'Counsel students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Educational Psychologist', 'description' => 'Provide psychological services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'School Psychologist', 'description' => 'Provide school psychology services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Worker - School', 'description' => 'Provide social work services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Child Psychologist', 'description' => 'Work with children', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Library & Resource
['name' => 'Librarian', 'description' => 'Manage school library', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'School Librarian', 'description' => 'Manage school library resources', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Library Assistant', 'description' => 'Assist in library', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Media Resource Specialist', 'description' => 'Manage media resources', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Laboratory Staff
['name' => 'Science Lab Assistant', 'description' => 'Assist in science lab', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Physics Lab Assistant', 'description' => 'Assist in physics lab', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemistry Lab Assistant', 'description' => 'Assist in chemistry lab', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Biology Lab Assistant', 'description' => 'Assist in biology lab', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Computer Lab Assistant', 'description' => 'Assist in computer lab', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lab Technician', 'description' => 'Manage laboratory equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Administrative Staff
['name' => 'School Secretary', 'description' => 'Provide secretarial support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Administrative Assistant', 'description' => 'Assist in administration', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Front Office Executive', 'description' => 'Manage front office', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Receptionist', 'description' => 'Handle reception', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Data Entry Operator', 'description' => 'Enter student data', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Clerk', 'description' => 'Perform clerical work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Office Assistant', 'description' => 'Assist in office', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Admissions Officer', 'description' => 'Handle student admissions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Admissions Counselor', 'description' => 'Counsel prospective students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Registrar', 'description' => 'Manage student records', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Examination Coordinator', 'description' => 'Coordinate examinations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Exam Controller', 'description' => 'Manage exam operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Accounts & Finance
['name' => 'School Accountant', 'description' => 'Manage school accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounts Assistant - School', 'description' => 'Assist in accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fee Clerk', 'description' => 'Manage fee collection', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cashier - School', 'description' => 'Handle cash transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Officer - School', 'description' => 'Manage school finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// HR & Personnel
['name' => 'HR Executive - School', 'description' => 'Manage school HR', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HR Manager - School', 'description' => 'Lead HR department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Payroll Officer - School', 'description' => 'Process school payroll', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Recruitment Officer', 'description' => 'Recruit school staff', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// IT & Technology
['name' => 'IT Coordinator - School', 'description' => 'Coordinate IT services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'School IT Administrator', 'description' => 'Manage school IT', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Computer Lab Manager', 'description' => 'Manage computer lab', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EdTech Coordinator', 'description' => 'Coordinate educational technology', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Learning Coordinator', 'description' => 'Coordinate digital learning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Transport
['name' => 'Transport Manager - School', 'description' => 'Manage school transport', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Transport Coordinator', 'description' => 'Coordinate transport', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bus Driver', 'description' => 'Drive school bus', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bus Attendant', 'description' => 'Assist on school bus', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Van Driver', 'description' => 'Drive school van', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Security
['name' => 'Security Guard - School', 'description' => 'Provide school security', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Security Supervisor', 'description' => 'Supervise security team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Security Incharge', 'description' => 'Lead security operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Maintenance & Housekeeping
['name' => 'Maintenance Supervisor', 'description' => 'Supervise maintenance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Electrician - School', 'description' => 'Handle electrical work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plumber - School', 'description' => 'Handle plumbing work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Carpenter - School', 'description' => 'Handle carpentry work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Gardener', 'description' => 'Maintain school garden', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Housekeeping Staff', 'description' => 'Clean school premises', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Janitor', 'description' => 'Maintain cleanliness', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sweeper', 'description' => 'Clean school areas', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Peon', 'description' => 'Perform general duties', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Office Boy', 'description' => 'Assist in office tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Health & Medical
['name' => 'School Nurse', 'description' => 'Provide healthcare services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Staff Nurse - School', 'description' => 'Provide nursing care', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'School Doctor', 'description' => 'Provide medical services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Health Coordinator', 'description' => 'Coordinate health programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Canteen & Food Services
['name' => 'Canteen Manager', 'description' => 'Manage school canteen', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cook - School', 'description' => 'Prepare meals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Kitchen Assistant', 'description' => 'Assist in kitchen', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mess Worker', 'description' => 'Work in mess', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Sports & Activities
['name' => 'Sports Coordinator', 'description' => 'Coordinate sports activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Physical Director', 'description' => 'Lead physical education', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sports Coach', 'description' => 'Coach sports teams', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cricket Coach', 'description' => 'Coach cricket', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Football Coach', 'description' => 'Coach football', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Basketball Coach', 'description' => 'Coach basketball', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Volleyball Coach', 'description' => 'Coach volleyball', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Swimming Coach', 'description' => 'Coach swimming', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Athletics Coach', 'description' => 'Coach athletics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chess Coach', 'description' => 'Coach chess', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Yoga Instructor', 'description' => 'Teach yoga', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Activity Coordinators
['name' => 'Activity Coordinator', 'description' => 'Coordinate school activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Event Coordinator', 'description' => 'Coordinate school events', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cultural Coordinator', 'description' => 'Coordinate cultural events', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'House Coordinator', 'description' => 'Coordinate house activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Boarding & Hostel (Residential Schools)
['name' => 'Hostel Warden', 'description' => 'Manage school hostel', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Boys Hostel Warden', 'description' => 'Manage boys hostel', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Girls Hostel Warden', 'description' => 'Manage girls hostel', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hostel Supervisor', 'description' => 'Supervise hostel', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Residential Caretaker', 'description' => 'Care for residential students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Parent Relations & Communication
['name' => 'Parent Relations Officer', 'description' => 'Manage parent relations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Community Relations Officer', 'description' => 'Manage community relations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Public Relations Officer', 'description' => 'Handle PR activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Marketing & Admissions
['name' => 'Marketing Executive - School', 'description' => 'Market school programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Admissions Marketing Manager', 'description' => 'Market admissions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'School Brand Manager', 'description' => 'Manage school brand', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Media Manager - School', 'description' => 'Manage school social media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Professional Development
['name' => 'Staff Development Coordinator', 'description' => 'Coordinate staff training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Professional Development Coordinator', 'description' => 'Coordinate professional development', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Teacher Trainer', 'description' => 'Train teachers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Substitute & Support Teaching
['name' => 'Substitute Teacher', 'description' => 'Fill in for absent teachers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Relief Teacher', 'description' => 'Provide teaching relief', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Teaching Assistant', 'description' => 'Assist teachers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Teacher Aide', 'description' => 'Support classroom teaching', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Student Support Assistant', 'description' => 'Support students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Tutoring & Remedial
['name' => 'Remedial Tutor', 'description' => 'Provide remedial tutoring', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'After School Tutor', 'description' => 'Provide after-school tutoring', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Homework Helper', 'description' => 'Assist with homework', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// International School Positions
['name' => 'IB Coordinator', 'description' => 'Coordinate IB programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IGCSE Coordinator', 'description' => 'Coordinate IGCSE programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cambridge Coordinator', 'description' => 'Coordinate Cambridge curriculum', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ESL Teacher', 'description' => 'Teach English as second language', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ESOL Teacher', 'description' => 'Teach English to speakers of other languages', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'TOEFL Instructor', 'description' => 'Prepare students for TOEFL', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IELTS Instructor', 'description' => 'Prepare students for IELTS', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Pre-School/Kindergarten Specific
['name' => 'Preschool Director', 'description' => 'Lead preschool operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Preschool Teacher', 'description' => 'Teach preschool children', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Daycare Teacher', 'description' => 'Teach in daycare', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Playgroup Teacher', 'description' => 'Teach playgroup', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Early Years Coordinator', 'description' => 'Coordinate early years program', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level & Internship
['name' => 'Teaching Intern', 'description' => 'Internship in teaching', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Student Teacher', 'description' => 'Practice teaching', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trainee Teacher', 'description' => 'Training to become teacher', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// ========== CA, CS, ACCA, CMA PROFESSIONAL POSITIONS ==========

// Chartered Accountant (CA) Positions
['name' => 'Chartered Accountant (CA)', 'description' => 'Professional accountant with CA certification', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Chartered Accountant', 'description' => 'Lead CA with extensive experience', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA Fresher', 'description' => 'Recently qualified CA', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA Intern', 'description' => 'CA article ship/internship', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA Articleship Trainee', 'description' => 'CA training period', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA Finalist', 'description' => 'Pursuing CA final level', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA Intermediate', 'description' => 'CA intermediate level qualified', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA Dropout', 'description' => 'Partial CA qualification', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CA - Audit & Assurance
['name' => 'Audit Manager - CA', 'description' => 'Manage audit engagements', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Audit Manager - CA', 'description' => 'Lead audit department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Internal Audit Manager - CA', 'description' => 'Lead internal audit', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Statutory Audit Manager', 'description' => 'Handle statutory audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Audit Manager', 'description' => 'Handle tax audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Audit Partner - CA', 'description' => 'Partner in audit firm', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Audit Associate - CA', 'description' => 'Assist in audit work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Audit Associate', 'description' => 'Lead audit assignments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CA - Taxation
['name' => 'Tax Manager - CA', 'description' => 'Manage tax department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Direct Tax Manager', 'description' => 'Handle direct taxation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Indirect Tax Manager', 'description' => 'Handle indirect taxation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GST Specialist - CA', 'description' => 'Specialize in GST', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Income Tax Specialist - CA', 'description' => 'Specialize in income tax', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'International Tax Specialist - CA', 'description' => 'Handle international tax', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Transfer Pricing Specialist - CA', 'description' => 'Handle transfer pricing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Consultant - CA', 'description' => 'Provide tax consulting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Partner - CA', 'description' => 'Partner in tax firm', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CA - Corporate Finance
['name' => 'Corporate Finance Manager - CA', 'description' => 'Manage corporate finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Controller - CA', 'description' => 'Lead finance control', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Controller - CA', 'description' => 'Oversee financial reporting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Group Finance Manager - CA', 'description' => 'Manage group finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Financial Officer (CFO) - CA', 'description' => 'Lead financial strategy (CA preferred)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'VP Finance - CA', 'description' => 'Vice President of Finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Finance Director - CA', 'description' => 'Direct finance operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CA - Accounting & Reporting
['name' => 'Financial Reporting Manager - CA', 'description' => 'Manage financial reporting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GL Accountant - CA', 'description' => 'Handle general ledger', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Consolidation Accountant - CA', 'description' => 'Handle consolidation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IFRS Specialist - CA', 'description' => 'Implement IFRS', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GAAP Specialist - CA', 'description' => 'Implement GAAP', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Accounting Manager - CA', 'description' => 'Manage accounting team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CA - Advisory & Consulting
['name' => 'Financial Advisory Manager - CA', 'description' => 'Provide financial advisory', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Advisory Partner - CA', 'description' => 'Lead business advisory', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'M&A Advisory - CA', 'description' => 'Advise on M&A', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Valuation Specialist - CA', 'description' => 'Perform valuations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Valuation Expert - CA', 'description' => 'Value businesses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Due Diligence Specialist - CA', 'description' => 'Conduct due diligence', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Forensic Accountant - CA', 'description' => 'Investigate financial fraud', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insolvency Professional - CA', 'description' => 'Handle insolvency', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bankruptcy Specialist - CA', 'description' => 'Handle bankruptcy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CA - Practice & Partnership
['name' => 'CA Practice Owner', 'description' => 'Own CA practice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Proprietor - CA Firm', 'description' => 'Run own CA firm', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Partner - CA Firm', 'description' => 'Partner in CA firm', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Managing Partner - CA', 'description' => 'Lead CA partnership', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Company Secretary (CS) Positions
['name' => 'Company Secretary (CS)', 'description' => 'Ensure legal and regulatory compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Company Secretary', 'description' => 'Lead company secretarial functions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CS Trainee', 'description' => 'CS training period', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CS Executive', 'description' => 'CS executive level', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CS Professional', 'description' => 'CS professional level', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Company Secretary Fresher', 'description' => 'Recently qualified CS', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CS - Corporate Governance
['name' => 'Corporate Governance Officer', 'description' => 'Ensure corporate governance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Governance Manager - CS', 'description' => 'Manage governance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Board Secretary', 'description' => 'Manage board meetings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compliance Officer - CS', 'description' => 'Ensure legal compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regulatory Compliance Manager', 'description' => 'Manage regulatory compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Secretarial Auditor', 'description' => 'Conduct secretarial audit', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CS - Legal & Regulatory
['name' => 'Legal Compliance Officer - CS', 'description' => 'Handle legal compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ROC Compliance Specialist', 'description' => 'Handle ROC filings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SEBI Compliance Officer', 'description' => 'Ensure SEBI compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Listing Compliance Officer', 'description' => 'Handle listing compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'FEMA Compliance Specialist', 'description' => 'Handle FEMA compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Company Law Specialist', 'description' => 'Specialize in company law', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CS - Corporate Secretarial
['name' => 'Corporate Secretary', 'description' => 'Manage corporate secretarial', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Company Secretary', 'description' => 'Assist company secretary', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Deputy Company Secretary', 'description' => 'Deputy to CS', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Joint Company Secretary', 'description' => 'Joint CS position', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Group Company Secretary', 'description' => 'Handle group secretarial', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Secretarial Manager', 'description' => 'Manage secretarial team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CS - Board & Meeting Management
['name' => 'Board Meeting Coordinator', 'description' => 'Coordinate board meetings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'AGM Coordinator', 'description' => 'Coordinate AGM', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EGM Coordinator', 'description' => 'Coordinate EGM', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Minutes Secretary', 'description' => 'Record meeting minutes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// ACCA Positions
['name' => 'ACCA (Association of Chartered Certified Accountants)', 'description' => 'ACCA qualified professional', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior ACCA Professional', 'description' => 'Experienced ACCA', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ACCA Trainee', 'description' => 'ACCA training period', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ACCA Affiliate', 'description' => 'ACCA affiliate status', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ACCA Member', 'description' => 'Full ACCA member', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ACCA Fresher', 'description' => 'Recently qualified ACCA', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// ACCA - International Finance
['name' => 'International Financial Accountant - ACCA', 'description' => 'Handle international accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Global Finance Manager - ACCA', 'description' => 'Manage global finance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IFRS Specialist - ACCA', 'description' => 'Implement IFRS', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'UK Accounting Specialist', 'description' => 'Handle UK accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'US GAAP Specialist - ACCA', 'description' => 'Handle US GAAP', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cross Border Tax Specialist - ACCA', 'description' => 'Handle international tax', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// ACCA - Financial Management
['name' => 'Financial Manager - ACCA', 'description' => 'Manage finance (ACCA)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Financial Analyst - ACCA', 'description' => 'Lead financial analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Financial Planning Manager - ACCA', 'description' => 'Manage FP&A', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Treasury Manager - ACCA', 'description' => 'Manage treasury', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Manager - ACCA', 'description' => 'Manage financial risk', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// ACCA - Audit & Assurance
['name' => 'Audit Manager - ACCA', 'description' => 'Manage audit (ACCA)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Auditor - ACCA', 'description' => 'Lead audit assignments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Internal Auditor - ACCA', 'description' => 'Conduct internal audit', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// ACCA - Practice
['name' => 'ACCA Practice Owner', 'description' => 'Own ACCA practice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Partner - ACCA Firm', 'description' => 'Partner in ACCA firm', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CMA (Certified Management Accountant) Positions
['name' => 'Certified Management Accountant (CMA)', 'description' => 'CMA qualified professional', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior CMA Professional', 'description' => 'Experienced CMA', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA Trainee', 'description' => 'CMA training period', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA Fresher', 'description' => 'Recently qualified CMA', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA (US)', 'description' => 'US CMA certification', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA (India)', 'description' => 'Indian CMA certification', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CMA - Management Accounting
['name' => 'Management Accountant - CMA', 'description' => 'Provide management accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Management Accountant', 'description' => 'Lead management accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Cost Accountant - CMA', 'description' => 'Handle cost accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Cost Accountant', 'description' => 'Lead cost accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Strategic Management Accountant', 'description' => 'Provide strategic accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CMA - Performance Management
['name' => 'Performance Management Specialist - CMA', 'description' => 'Manage performance metrics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'KPIs Specialist - CMA', 'description' => 'Define KPIs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Balanced Scorecard Specialist', 'description' => 'Implement balanced scorecard', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Variance Analysis Specialist', 'description' => 'Analyze variances', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CMA - Cost Management
['name' => 'Cost Manager - CMA', 'description' => 'Manage cost accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Costing Specialist', 'description' => 'Handle product costing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Activity Based Costing Specialist', 'description' => 'Implement ABC', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Standard Costing Specialist', 'description' => 'Implement standard costing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inventory Valuation Specialist', 'description' => 'Value inventory', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CMA - Financial Analysis
['name' => 'Financial Analyst - CMA', 'description' => 'Analyze financial data', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Analyst - CMA', 'description' => 'Analyze business performance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Budget Analyst - CMA', 'description' => 'Analyze budgets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Forecasting Analyst - CMA', 'description' => 'Prepare forecasts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// CMA - Strategic Planning
['name' => 'Strategic Planning Manager - CMA', 'description' => 'Lead strategic planning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Strategy Analyst - CMA', 'description' => 'Analyze corporate strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Decision Support Analyst - CMA', 'description' => 'Support decision making', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Combined/Cross-Qualification Positions
['name' => 'CA/CS Professional', 'description' => 'Both CA and CS qualified', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA/CMA Professional', 'description' => 'Both CA and CMA qualified', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CS/CMA Professional', 'description' => 'Both CS and CMA qualified', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA/ACCA Professional', 'description' => 'Both CA and ACCA qualified', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA/ACCA Professional', 'description' => 'Both CMA and ACCA qualified', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA/CS/CMA Professional', 'description' => 'Triple qualified professional', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Teaching & Training - Professional Courses
['name' => 'CA Faculty', 'description' => 'Teach CA courses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CS Faculty', 'description' => 'Teach CS courses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ACCA Faculty', 'description' => 'Teach ACCA courses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA Faculty', 'description' => 'Teach CMA courses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA Coach', 'description' => 'Coach CA students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CS Coach', 'description' => 'Coach CS students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ACCA Coach', 'description' => 'Coach ACCA students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA Coach', 'description' => 'Coach CMA students', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Training & Coaching Centers
['name' => 'CA Training Center Manager', 'description' => 'Manage CA training center', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CS Training Center Manager', 'description' => 'Manage CS training center', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ACCA Training Center Manager', 'description' => 'Manage ACCA training center', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA Training Center Manager', 'description' => 'Manage CMA training center', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Professional Course Counselor', 'description' => 'Counsel for professional courses', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Industry-Specific Roles
['name' => 'Banking Finance Manager - CA', 'description' => 'CA in banking sector', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insurance Finance Manager - CA', 'description' => 'CA in insurance sector', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Manufacturing Finance Manager - CA', 'description' => 'CA in manufacturing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'IT Finance Manager - CA', 'description' => 'CA in IT sector', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Startup Finance Manager - CA', 'description' => 'CA in startup', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'NGO Finance Manager - CA', 'description' => 'CA in NGO sector', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Outsourced Accounting Services
['name' => 'Outsourced Accounting Manager - CA', 'description' => 'Manage outsourced accounting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Remote Accountant - CA', 'description' => 'Remote CA services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Virtual CFO - CA', 'description' => 'Provide virtual CFO services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Virtual CS', 'description' => 'Provide virtual CS services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Specialized Roles
['name' => 'GST Practitioner - CA', 'description' => 'Practice GST', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Income Tax Practitioner', 'description' => 'Practice income tax', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tax Return Preparer - CA', 'description' => 'Prepare tax returns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ROC Filing Specialist - CS', 'description' => 'Handle ROC filings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Xero Specialist - CA/ACCA', 'description' => 'Specialize in Xero', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'QuickBooks Specialist - CA/ACCA', 'description' => 'Specialize in QuickBooks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SAP FICO Consultant - CA', 'description' => 'Implement SAP FICO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Oracle Financials Consultant - CA', 'description' => 'Implement Oracle Financials', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tally Specialist - CA', 'description' => 'Specialize in Tally', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level & Internship
['name' => 'CA Articled Assistant', 'description' => 'CA articleship', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CS Trainee', 'description' => 'CS training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ACCA Trainee', 'description' => 'ACCA training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA Trainee', 'description' => 'CMA training', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CA Intern', 'description' => 'CA internship', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CS Intern', 'description' => 'CS internship', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ACCA Intern', 'description' => 'ACCA internship', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CMA Intern', 'description' => 'CMA internship', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Senior Executive Roles
['name' => 'Chief Compliance Officer - CS', 'description' => 'Lead compliance (CS preferred)', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Risk Officer - CA/CMA', 'description' => 'Lead risk management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Internal Auditor - CA', 'description' => 'Lead internal audit', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chief Accounting Officer - CA', 'description' => 'Lead accounting function', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Consulting Roles
['name' => 'Finance Transformation Consultant - CA', 'description' => 'Transform finance function', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ERP Implementation Consultant - CA', 'description' => 'Implement ERP systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Improvement Consultant - CMA', 'description' => 'Improve finance processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shared Services Consultant - CA', 'description' => 'Set up shared services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
// ========== MARKETING POSITIONS ==========

// Core Marketing Leadership
['name' => 'Chief Marketing Officer (CMO)', 'description' => 'Lead overall marketing strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Director', 'description' => 'Direct marketing operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Marketing Director', 'description' => 'Lead marketing department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'VP of Marketing', 'description' => 'Vice President of Marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Head of Marketing', 'description' => 'Lead marketing team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Manager', 'description' => 'Manage marketing campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Marketing Manager', 'description' => 'Lead marketing initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Marketing Manager', 'description' => 'Support marketing manager', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Deputy Marketing Manager', 'description' => 'Deputy to marketing manager', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Executive', 'description' => 'Execute marketing activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Marketing Executive', 'description' => 'Lead marketing execution', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Coordinator', 'description' => 'Coordinate marketing activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Associate', 'description' => 'Assist marketing team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Intern', 'description' => 'Internship in marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Brand Management
['name' => 'Brand Manager', 'description' => 'Manage brand strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Brand Manager', 'description' => 'Lead brand management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Assistant Brand Manager', 'description' => 'Assist brand manager', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Brand Executive', 'description' => 'Execute brand activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Brand Coordinator', 'description' => 'Coordinate brand initiatives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Brand Strategist', 'description' => 'Develop brand strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Brand Consultant', 'description' => 'Consult on branding', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Brand Identity Designer', 'description' => 'Design brand identity', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Product Marketing
['name' => 'Product Marketing Manager', 'description' => 'Manage product marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Product Marketing Manager', 'description' => 'Lead product marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Marketing Executive', 'description' => 'Execute product marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Marketing Specialist', 'description' => 'Specialize in product marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Launch Manager', 'description' => 'Manage product launches', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Go-to-Market Manager', 'description' => 'Plan go-to-market strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Category Management
['name' => 'Category Manager', 'description' => 'Manage product categories', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Category Manager', 'description' => 'Lead category management', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Category Executive', 'description' => 'Execute category plans', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Category Coordinator', 'description' => 'Coordinate category activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Digital Marketing
['name' => 'Digital Marketing Manager', 'description' => 'Manage digital marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Digital Marketing Manager', 'description' => 'Lead digital marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Marketing Executive', 'description' => 'Execute digital campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Marketing Specialist', 'description' => 'Specialize in digital marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Marketing Coordinator', 'description' => 'Coordinate digital activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Marketing Analyst', 'description' => 'Analyze digital campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Digital Marketing Consultant', 'description' => 'Consult on digital marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// SEO (Search Engine Optimization)
['name' => 'SEO Manager', 'description' => 'Manage SEO strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior SEO Manager', 'description' => 'Lead SEO team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SEO Executive', 'description' => 'Execute SEO activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SEO Specialist', 'description' => 'Specialize in SEO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SEO Analyst', 'description' => 'Analyze SEO performance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SEO Coordinator', 'description' => 'Coordinate SEO activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Off-Page SEO Specialist', 'description' => 'Handle off-page SEO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'On-Page SEO Specialist', 'description' => 'Handle on-page SEO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Technical SEO Specialist', 'description' => 'Handle technical SEO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Link Building Specialist', 'description' => 'Build backlinks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Local SEO Specialist', 'description' => 'Handle local SEO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'E-commerce SEO Specialist', 'description' => 'Handle e-commerce SEO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// SEM (Search Engine Marketing) / PPC
['name' => 'SEM Manager', 'description' => 'Manage search engine marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PPC Manager', 'description' => 'Manage PPC campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PPC Specialist', 'description' => 'Specialize in PPC', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Google Ads Specialist', 'description' => 'Manage Google Ads', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Bing Ads Specialist', 'description' => 'Manage Bing Ads', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Paid Search Specialist', 'description' => 'Manage paid search', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SEM Executive', 'description' => 'Execute SEM campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Paid Media Manager', 'description' => 'Manage paid media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Paid Media Specialist', 'description' => 'Specialize in paid media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Social Media Marketing
['name' => 'Social Media Manager', 'description' => 'Manage social media presence', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Social Media Manager', 'description' => 'Lead social media team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Media Executive', 'description' => 'Execute social media activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Media Specialist', 'description' => 'Specialize in social media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Media Coordinator', 'description' => 'Coordinate social media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Media Analyst', 'description' => 'Analyze social media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Facebook Marketing Specialist', 'description' => 'Manage Facebook marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Instagram Marketing Specialist', 'description' => 'Manage Instagram marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Twitter Marketing Specialist', 'description' => 'Manage Twitter marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'LinkedIn Marketing Specialist', 'description' => 'Manage LinkedIn marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'YouTube Marketing Specialist', 'description' => 'Manage YouTube marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pinterest Marketing Specialist', 'description' => 'Manage Pinterest marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Snapchat Marketing Specialist', 'description' => 'Manage Snapchat marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'TikTok Marketing Specialist', 'description' => 'Manage TikTok marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Media Strategist', 'description' => 'Develop social strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Community Manager', 'description' => 'Manage online community', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Media Copywriter', 'description' => 'Write social media content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Social Media Graphic Designer', 'description' => 'Design social media graphics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Influencer Marketing Manager', 'description' => 'Manage influencer partnerships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Influencer Marketing Specialist', 'description' => 'Specialize in influencer marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Content Marketing
['name' => 'Content Marketing Manager', 'description' => 'Manage content marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Content Marketing Manager', 'description' => 'Lead content marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Content Marketing Executive', 'description' => 'Execute content marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Content Marketing Specialist', 'description' => 'Specialize in content marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Content Strategist', 'description' => 'Develop content strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Content Writer', 'description' => 'Write marketing content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Content Writer', 'description' => 'Lead content writing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Copywriter', 'description' => 'Write copy for marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Copywriter', 'description' => 'Lead copywriting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Technical Writer', 'description' => 'Write technical content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Blog Writer', 'description' => 'Write blog posts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SEO Content Writer', 'description' => 'Write SEO-optimized content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Content Editor', 'description' => 'Edit marketing content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Content Coordinator', 'description' => 'Coordinate content creation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Content Creator', 'description' => 'Create marketing content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Video Content Creator', 'description' => 'Create video content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Email Marketing
['name' => 'Email Marketing Manager', 'description' => 'Manage email marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Email Marketing Specialist', 'description' => 'Specialize in email marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Email Marketing Executive', 'description' => 'Execute email campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Email Marketing Coordinator', 'description' => 'Coordinate email marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Automation Specialist', 'description' => 'Handle marketing automation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Automation Manager', 'description' => 'Manage marketing automation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CRM Manager', 'description' => 'Manage CRM systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CRM Specialist', 'description' => 'Specialize in CRM', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HubSpot Specialist', 'description' => 'Manage HubSpot', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Mailchimp Specialist', 'description' => 'Manage Mailchimp', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Performance Marketing
['name' => 'Performance Marketing Manager', 'description' => 'Manage performance marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Performance Marketing Specialist', 'description' => 'Specialize in performance marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Growth Marketing Manager', 'description' => 'Drive growth marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Growth Hacker', 'description' => 'Drive rapid growth', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Growth Marketing Specialist', 'description' => 'Specialize in growth marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Conversion Rate Optimization (CRO) Manager', 'description' => 'Optimize conversion rates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CRO Specialist', 'description' => 'Specialize in CRO', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'A/B Testing Specialist', 'description' => 'Conduct A/B tests', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Retention Marketing Manager', 'description' => 'Manage customer retention', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Retention Marketing Specialist', 'description' => 'Specialize in retention', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Marketing Analytics
['name' => 'Marketing Analyst', 'description' => 'Analyze marketing data', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Marketing Analyst', 'description' => 'Lead marketing analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Data Analyst', 'description' => 'Analyze marketing data', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Analytics Manager', 'description' => 'Manage marketing analytics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Intelligence Analyst', 'description' => 'Gather marketing intelligence', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Insights Specialist', 'description' => 'Provide marketing insights', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Customer Insights Analyst', 'description' => 'Analyze customer insights', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Data Scientist', 'description' => 'Apply data science to marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Reporting Analyst', 'description' => 'Create marketing reports', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Market Research
['name' => 'Market Research Manager', 'description' => 'Manage market research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Market Research Analyst', 'description' => 'Conduct market research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Market Research Analyst', 'description' => 'Lead market research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Market Research Executive', 'description' => 'Execute market research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Consumer Insights Manager', 'description' => 'Manage consumer insights', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Consumer Insights Analyst', 'description' => 'Analyze consumer insights', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Competitive Intelligence Analyst', 'description' => 'Analyze competition', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Survey Specialist', 'description' => 'Design and conduct surveys', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Trade Marketing
['name' => 'Trade Marketing Manager', 'description' => 'Manage trade marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Trade Marketing Manager', 'description' => 'Lead trade marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trade Marketing Executive', 'description' => 'Execute trade marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trade Marketing Specialist', 'description' => 'Specialize in trade marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Channel Marketing Manager', 'description' => 'Manage channel marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Channel Marketing Specialist', 'description' => 'Specialize in channel marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Retail Marketing Manager', 'description' => 'Manage retail marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Retail Marketing Specialist', 'description' => 'Specialize in retail marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Distributor Marketing Manager', 'description' => 'Manage distributor marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Field Marketing
['name' => 'Field Marketing Manager', 'description' => 'Manage field marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Field Marketing Executive', 'description' => 'Execute field marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Field Marketing Specialist', 'description' => 'Specialize in field marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Marketing Manager', 'description' => 'Manage regional marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Area Marketing Manager', 'description' => 'Manage area marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Zonal Marketing Manager', 'description' => 'Manage zonal marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Event Marketing
['name' => 'Event Marketing Manager', 'description' => 'Manage event marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Event Marketing Executive', 'description' => 'Execute event marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Event Marketing Specialist', 'description' => 'Specialize in event marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Trade Show Coordinator', 'description' => 'Coordinate trade shows', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Exhibition Manager', 'description' => 'Manage exhibitions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Conference Manager', 'description' => 'Manage conferences', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Webinar Manager', 'description' => 'Manage webinars', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Affiliate Marketing
['name' => 'Affiliate Marketing Manager', 'description' => 'Manage affiliate marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Affiliate Marketing Specialist', 'description' => 'Specialize in affiliate marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Affiliate Coordinator', 'description' => 'Coordinate affiliate program', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Partnership Marketing Manager', 'description' => 'Manage partnership marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Partner Marketing Specialist', 'description' => 'Specialize in partner marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// E-commerce Marketing
['name' => 'E-commerce Marketing Manager', 'description' => 'Manage e-commerce marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'E-commerce Marketing Executive', 'description' => 'Execute e-commerce marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'E-commerce Marketing Specialist', 'description' => 'Specialize in e-commerce marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Amazon Marketing Specialist', 'description' => 'Manage Amazon marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Flipkart Marketing Specialist', 'description' => 'Manage Flipkart marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'E-commerce Marketplace Manager', 'description' => 'Manage marketplace', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'D2C Marketing Manager', 'description' => 'Manage direct-to-consumer marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'E-commerce Listing Specialist', 'description' => 'Manage product listings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'E-commerce Catalog Manager', 'description' => 'Manage e-commerce catalog', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// B2B Marketing
['name' => 'B2B Marketing Manager', 'description' => 'Manage B2B marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior B2B Marketing Manager', 'description' => 'Lead B2B marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'B2B Marketing Executive', 'description' => 'Execute B2B marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'B2B Marketing Specialist', 'description' => 'Specialize in B2B marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Account-Based Marketing (ABM) Manager', 'description' => 'Manage ABM strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ABM Specialist', 'description' => 'Specialize in account-based marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lead Generation Manager', 'description' => 'Manage lead generation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lead Generation Specialist', 'description' => 'Generate leads', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Demand Generation Manager', 'description' => 'Manage demand generation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Demand Generation Specialist', 'description' => 'Specialize in demand generation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// B2C Marketing
['name' => 'B2C Marketing Manager', 'description' => 'Manage B2C marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'B2C Marketing Executive', 'description' => 'Execute B2C marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'B2C Marketing Specialist', 'description' => 'Specialize in B2C marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Consumer Marketing Manager', 'description' => 'Manage consumer marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Loyalty Marketing Manager', 'description' => 'Manage loyalty programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Loyalty Program Specialist', 'description' => 'Specialize in loyalty programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// International Marketing
['name' => 'International Marketing Manager', 'description' => 'Manage international marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Global Marketing Manager', 'description' => 'Manage global marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Export Marketing Manager', 'description' => 'Manage export marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Marketing Manager - APAC', 'description' => 'Manage APAC marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Marketing Manager - EMEA', 'description' => 'Manage EMEA marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Regional Marketing Manager - Americas', 'description' => 'Manage Americas marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// PR & Communications
['name' => 'Public Relations Manager', 'description' => 'Manage public relations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PR Executive', 'description' => 'Execute PR activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PR Specialist', 'description' => 'Specialize in PR', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Communications Manager', 'description' => 'Manage corporate communications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Corporate Communications Executive', 'description' => 'Execute corporate communications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Media Relations Manager', 'description' => 'Manage media relations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Media Relations Specialist', 'description' => 'Specialize in media relations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Press Officer', 'description' => 'Handle press relations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Crisis Communications Manager', 'description' => 'Manage crisis communications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Internal Communications Manager', 'description' => 'Manage internal communications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Internal Communications Specialist', 'description' => 'Specialize in internal communications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Creative Services
['name' => 'Creative Director', 'description' => 'Lead creative team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Associate Creative Director', 'description' => 'Associate creative director', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Art Director', 'description' => 'Lead art direction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Graphic Designer', 'description' => 'Create graphic designs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Graphic Designer', 'description' => 'Lead graphic design', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Visual Designer', 'description' => 'Create visual designs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'UI Designer', 'description' => 'Design user interfaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'UX Designer', 'description' => 'Design user experiences', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Video & Multimedia
['name' => 'Video Marketing Manager', 'description' => 'Manage video marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Video Producer', 'description' => 'Produce videos', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Video Editor', 'description' => 'Edit videos', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Motion Graphics Designer', 'description' => 'Create motion graphics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Animator', 'description' => 'Create animations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Podcast Manager', 'description' => 'Manage podcasts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Podcast Producer', 'description' => 'Produce podcasts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Advertising
['name' => 'Advertising Manager', 'description' => 'Manage advertising', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Advertising Executive', 'description' => 'Execute advertising', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Media Planner', 'description' => 'Plan media campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Media Buyer', 'description' => 'Buy media space', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Programmatic Advertising Specialist', 'description' => 'Handle programmatic ads', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Display Advertising Specialist', 'description' => 'Manage display ads', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'TV Advertising Manager', 'description' => 'Manage TV advertising', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Radio Advertising Manager', 'description' => 'Manage radio advertising', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Print Advertising Manager', 'description' => 'Manage print advertising', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Outdoor Advertising Manager', 'description' => 'Manage outdoor advertising', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Agency Roles
['name' => 'Account Manager - Agency', 'description' => 'Manage client accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Account Manager - Agency', 'description' => 'Lead client accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Account Executive - Agency', 'description' => 'Execute client work', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Account Planner', 'description' => 'Plan client strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Strategic Planner', 'description' => 'Develop strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Media Planner - Agency', 'description' => 'Plan media strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Media Buyer - Agency', 'description' => 'Buy media', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Product Management (Marketing)
['name' => 'Product Marketing Manager', 'description' => 'Manage product marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Manager - Marketing', 'description' => 'Manage marketing products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Owner - Marketing', 'description' => 'Own marketing products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Industry-Specific Marketing
['name' => 'FMCG Marketing Manager', 'description' => 'Manage FMCG marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Retail Marketing Manager', 'description' => 'Manage retail marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pharmaceutical Marketing Manager', 'description' => 'Manage pharma marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Healthcare Marketing Manager', 'description' => 'Manage healthcare marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Education Marketing Manager', 'description' => 'Manage education marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EdTech Marketing Manager', 'description' => 'Manage EdTech marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SaaS Marketing Manager', 'description' => 'Manage SaaS marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tech Marketing Manager', 'description' => 'Manage tech marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fintech Marketing Manager', 'description' => 'Manage fintech marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Banking Marketing Manager', 'description' => 'Manage banking marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insurance Marketing Manager', 'description' => 'Manage insurance marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Real Estate Marketing Manager', 'description' => 'Manage real estate marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Automotive Marketing Manager', 'description' => 'Manage automotive marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hospitality Marketing Manager', 'description' => 'Manage hospitality marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Travel Marketing Manager', 'description' => 'Manage travel marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Tourism Marketing Manager', 'description' => 'Manage tourism marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Luxury Marketing Manager', 'description' => 'Manage luxury marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fashion Marketing Manager', 'description' => 'Manage fashion marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Beauty Marketing Manager', 'description' => 'Manage beauty marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sports Marketing Manager', 'description' => 'Manage sports marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Entertainment Marketing Manager', 'description' => 'Manage entertainment marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Media Marketing Manager', 'description' => 'Manage media marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level Marketing
['name' => 'Marketing Trainee', 'description' => 'Training in marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Apprentice', 'description' => 'Apprenticeship in marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Marketing Executive', 'description' => 'Entry-level marketing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Fresher', 'description' => 'Fresh marketing graduate', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Marketing Assistant', 'description' => 'Assist marketing team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
        ['name' => 'Chemical Engineer', 'description' => 'Design and optimize chemical processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Chemical Engineer', 'description' => 'Lead chemical engineering projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Chemical Engineer', 'description' => 'Assist in chemical engineering tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Process Engineer', 'description' => 'Design and improve chemical processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Process Engineer', 'description' => 'Lead process engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Development Engineer', 'description' => 'Develop new chemical processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Design Engineer', 'description' => 'Design chemical process systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Optimization Engineer', 'description' => 'Optimize chemical processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Process Safety
['name' => 'Process Safety Engineer', 'description' => 'Ensure chemical process safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Process Safety Engineer', 'description' => 'Lead process safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Safety Manager', 'description' => 'Manage process safety programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HAZOP Study Leader', 'description' => 'Lead HAZOP studies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Risk Assessment Engineer', 'description' => 'Assess chemical risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Safety Relief Engineer', 'description' => 'Design safety relief systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'LOPA Specialist', 'description' => 'Conduct Layer of Protection Analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SIL Engineer', 'description' => 'Handle Safety Integrity Level', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Production & Manufacturing
['name' => 'Production Engineer - Chemical', 'description' => 'Manage chemical production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Production Engineer', 'description' => 'Lead chemical production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Manager - Chemical', 'description' => 'Lead chemical production department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plant Manager - Chemical', 'description' => 'Manage chemical plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Shift Supervisor - Chemical', 'description' => 'Supervise chemical plant shifts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Production Supervisor', 'description' => 'Supervise production activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Plant Operator', 'description' => 'Operate chemical plant equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Plant Operator', 'description' => 'Lead plant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Control Room Operator', 'description' => 'Operate chemical plant control room', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Field Operator', 'description' => 'Operate field equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'DCS Operator', 'description' => 'Operate Distributed Control System', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Batch Process Operator', 'description' => 'Manage batch chemical processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Continuous Process Operator', 'description' => 'Manage continuous chemical processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Quality Control & Assurance
['name' => 'Quality Control Chemist', 'description' => 'Test chemical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Quality Control Chemist', 'description' => 'Lead quality control', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Assurance Manager - Chemical', 'description' => 'Manage QA in chemical industry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Control Manager', 'description' => 'Manage QC department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Control Analyst', 'description' => 'Analyze chemical quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Quality Inspector', 'description' => 'Inspect chemical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Quality Assurance Specialist', 'description' => 'Specialize in QA', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'ISO Coordinator - Chemical', 'description' => 'Manage ISO certification', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GMP Specialist', 'description' => 'Ensure GMP compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GLP Specialist', 'description' => 'Ensure GLP compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Research & Development
['name' => 'Research Chemist', 'description' => 'Conduct chemical research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Research Chemist', 'description' => 'Lead chemical research', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'R&D Chemist', 'description' => 'Work in R&D', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'R&D Engineer - Chemical', 'description' => 'Chemical R&D engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'R&D Manager - Chemical', 'description' => 'Manage chemical R&D', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Development Chemist', 'description' => 'Develop new chemical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Formulation Chemist', 'description' => 'Develop chemical formulations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Synthesis Chemist', 'description' => 'Perform chemical synthesis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Organic Chemist', 'description' => 'Specialize in organic chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inorganic Chemist', 'description' => 'Specialize in inorganic chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Analytical Chemist', 'description' => 'Perform chemical analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Physical Chemist', 'description' => 'Study physical chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Polymer Chemist', 'description' => 'Specialize in polymers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Surface Chemist', 'description' => 'Study surface chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Catalysis Chemist', 'description' => 'Specialize in catalysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Scale-up Engineer', 'description' => 'Scale up chemical processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Analytical Chemistry
['name' => 'Analytical Chemist', 'description' => 'Perform chemical analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Analytical Chemist', 'description' => 'Lead analytical chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Analytical Lab Manager', 'description' => 'Manage analytical lab', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Instrumentation Chemist', 'description' => 'Handle analytical instruments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HPLC Specialist', 'description' => 'Operate HPLC systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GC Specialist', 'description' => 'Operate GC systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'LC-MS Specialist', 'description' => 'Operate LC-MS systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GC-MS Specialist', 'description' => 'Operate GC-MS systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'FTIR Specialist', 'description' => 'Operate FTIR spectrometers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'NMR Specialist', 'description' => 'Operate NMR spectrometers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Spectroscopy Specialist', 'description' => 'Specialize in spectroscopy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chromatography Specialist', 'description' => 'Specialize in chromatography', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Wet Chemistry Analyst', 'description' => 'Perform wet chemistry analysis', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Stability Analyst', 'description' => 'Test chemical stability', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Method Development Chemist', 'description' => 'Develop analytical methods', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Method Validation Chemist', 'description' => 'Validate analytical methods', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Petrochemical & Oil & Gas
['name' => 'Petrochemical Engineer', 'description' => 'Work in petrochemical industry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Refinery Engineer', 'description' => 'Work in oil refinery', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Refinery Process Engineer', 'description' => 'Optimize refinery processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Oil & Gas Process Engineer', 'description' => 'Design oil & gas processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Upstream Process Engineer', 'description' => 'Work in upstream operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Downstream Process Engineer', 'description' => 'Work in downstream operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Crude Distillation Engineer', 'description' => 'Manage crude distillation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Catalytic Cracking Engineer', 'description' => 'Manage catalytic cracking', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hydrocracking Engineer', 'description' => 'Manage hydrocracking', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hydrotreating Engineer', 'description' => 'Manage hydrotreating', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Reforming Engineer', 'description' => 'Manage catalytic reforming', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Alkylation Engineer', 'description' => 'Manage alkylation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Isomerization Engineer', 'description' => 'Manage isomerization', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'LNG Process Engineer', 'description' => 'Work with LNG', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'LPG Process Engineer', 'description' => 'Work with LPG', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Gas Processing Engineer', 'description' => 'Process natural gas', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pipeline Engineer', 'description' => 'Design chemical pipelines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Pharmaceutical & Fine Chemicals
['name' => 'Pharmaceutical Chemist', 'description' => 'Work in pharma chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pharmaceutical Process Engineer', 'description' => 'Design pharma processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'API Process Engineer', 'description' => 'Develop API processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'API Manufacturing Engineer', 'description' => 'Manufacture APIs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fine Chemicals Engineer', 'description' => 'Work with fine chemicals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Specialty Chemicals Engineer', 'description' => 'Work with specialty chemicals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Intermediates Chemist', 'description' => 'Synthesize chemical intermediates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Polymers & Plastics
['name' => 'Polymer Engineer', 'description' => 'Work with polymers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Polymer Chemist', 'description' => 'Specialize in polymer chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plastics Engineer', 'description' => 'Work with plastics', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Polymerization Engineer', 'description' => 'Manage polymerization', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Polymer Processing Engineer', 'description' => 'Process polymers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compound Development Chemist', 'description' => 'Develop polymer compounds', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Extrusion Engineer', 'description' => 'Manage extrusion', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Injection Molding Engineer', 'description' => 'Manage injection molding', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Blow Molding Engineer', 'description' => 'Manage blow molding', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Thermoforming Engineer', 'description' => 'Manage thermoforming', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Agrochemicals & Fertilizers
['name' => 'Agrochemical Chemist', 'description' => 'Work with agrochemicals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fertilizer Engineer', 'description' => 'Work with fertilizers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pesticide Chemist', 'description' => 'Develop pesticides', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Herbicide Chemist', 'description' => 'Develop herbicides', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fungicide Chemist', 'description' => 'Develop fungicides', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Insecticide Chemist', 'description' => 'Develop insecticides', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Urea Plant Engineer', 'description' => 'Work in urea plant', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Ammonia Plant Engineer', 'description' => 'Work in ammonia plant', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Phosphate Fertilizer Engineer', 'description' => 'Work with phosphate fertilizers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'NPK Fertilizer Engineer', 'description' => 'Produce NPK fertilizers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Dyes & Pigments
['name' => 'Dyes Chemist', 'description' => 'Develop dyes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pigments Chemist', 'description' => 'Develop pigments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Color Chemist', 'description' => 'Specialize in color chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Textile Chemicals Engineer', 'description' => 'Work with textile chemicals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Ink Chemist', 'description' => 'Develop inks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Coatings Chemist', 'description' => 'Develop coatings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Paints, Coatings & Adhesives
['name' => 'Paint Chemist', 'description' => 'Develop paints', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Coatings Chemist', 'description' => 'Develop coatings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Adhesives Chemist', 'description' => 'Develop adhesives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sealants Chemist', 'description' => 'Develop sealants', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Paint Formulator', 'description' => 'Formulate paints', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Coating Formulator', 'description' => 'Formulate coatings', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Adhesive Formulator', 'description' => 'Formulate adhesives', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Color Matcher', 'description' => 'Match colors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Surfactants & Detergents
['name' => 'Surfactant Chemist', 'description' => 'Develop surfactants', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Detergent Chemist', 'description' => 'Develop detergents', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Soap Chemist', 'description' => 'Develop soaps', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Emulsion Chemist', 'description' => 'Work with emulsions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Cosmetics & Personal Care
['name' => 'Cosmetic Chemist', 'description' => 'Develop cosmetic products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Personal Care Chemist', 'description' => 'Develop personal care products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Skincare Chemist', 'description' => 'Develop skincare products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Haircare Chemist', 'description' => 'Develop haircare products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Toiletries Chemist', 'description' => 'Develop toiletries', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Fragrance Chemist', 'description' => 'Develop fragrances', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Flavor Chemist', 'description' => 'Develop flavors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Perfumer', 'description' => 'Create perfumes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Environmental & Green Chemistry
['name' => 'Environmental Chemist', 'description' => 'Study environmental chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Green Chemist', 'description' => 'Develop green chemistry processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Sustainable Chemistry Engineer', 'description' => 'Promote sustainable chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Waste Treatment Chemist', 'description' => 'Treat chemical waste', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Effluent Treatment Engineer', 'description' => 'Manage effluent treatment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Water Treatment Chemist', 'description' => 'Treat water', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Air Pollution Control Engineer', 'description' => 'Control air pollution', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Hazardous Waste Engineer', 'description' => 'Manage hazardous waste', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Maintenance & Reliability
['name' => 'Chemical Plant Maintenance Engineer', 'description' => 'Maintain chemical plant', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Rotating Equipment Engineer', 'description' => 'Maintain rotating equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Static Equipment Engineer', 'description' => 'Maintain static equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Pump Engineer', 'description' => 'Maintain pumps', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Compressor Engineer', 'description' => 'Maintain compressors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Heat Exchanger Engineer', 'description' => 'Maintain heat exchangers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Reactor Engineer', 'description' => 'Maintain reactors', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Distillation Column Engineer', 'description' => 'Maintain distillation columns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Reliability Engineer - Chemical', 'description' => 'Improve equipment reliability', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Instrumentation & Control
['name' => 'Chemical Instrumentation Engineer', 'description' => 'Manage chemical instruments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Control Engineer', 'description' => 'Design process control', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'DCS Engineer', 'description' => 'Manage DCS systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'PLC Engineer', 'description' => 'Program PLCs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SCADA Engineer', 'description' => 'Manage SCADA systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Project Engineering
['name' => 'Chemical Project Engineer', 'description' => 'Manage chemical projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Senior Project Engineer - Chemical', 'description' => 'Lead chemical projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Project Manager - Chemical', 'description' => 'Manage chemical projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'EPC Project Engineer', 'description' => 'Work on EPC projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Capital Projects Engineer', 'description' => 'Manage capital projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Plant Expansion Engineer', 'description' => 'Plan plant expansion', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Debottlenecking Engineer', 'description' => 'Identify bottlenecks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Chemical Sales & Marketing
['name' => 'Chemical Sales Engineer', 'description' => 'Sell chemical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Technical Sales - Chemicals', 'description' => 'Provide technical sales', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Marketing Manager', 'description' => 'Market chemical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Business Development - Chemicals', 'description' => 'Develop chemical business', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Product Manager - Chemicals', 'description' => 'Manage chemical products', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Distributor Manager', 'description' => 'Manage chemical distribution', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Procurement Specialist', 'description' => 'Procure chemicals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Supply Chain Manager', 'description' => 'Manage chemical supply chain', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Regulatory & Compliance
['name' => 'Regulatory Affairs Specialist - Chemical', 'description' => 'Handle chemical regulations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'REACH Compliance Specialist', 'description' => 'Manage REACH compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'CLP Compliance Specialist', 'description' => 'Manage CLP compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'GHS Compliance Specialist', 'description' => 'Manage GHS compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'TSCA Compliance Specialist', 'description' => 'Manage TSCA compliance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Safety Assessor', 'description' => 'Assess chemical safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'MSDS Author', 'description' => 'Write Material Safety Data Sheets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'SDS Author', 'description' => 'Write Safety Data Sheets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Labeling Specialist', 'description' => 'Create chemical labels', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Safety & HSE
['name' => 'Chemical Safety Officer', 'description' => 'Ensure chemical safety', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HSE Officer - Chemical', 'description' => 'Manage HSE in chemical plant', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'HSE Manager - Chemical', 'description' => 'Lead HSE in chemical industry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Industrial Hygienist', 'description' => 'Monitor chemical exposure', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Risk Assessor', 'description' => 'Assess chemical risks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Teaching & Academia
['name' => 'Chemistry Professor', 'description' => 'Teach chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Engineering Professor', 'description' => 'Teach chemical engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Analytical Chemistry Lecturer', 'description' => 'Teach analytical chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Organic Chemistry Lecturer', 'description' => 'Teach organic chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Inorganic Chemistry Lecturer', 'description' => 'Teach inorganic chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Physical Chemistry Lecturer', 'description' => 'Teach physical chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Polymer Chemistry Lecturer', 'description' => 'Teach polymer chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],

// Entry Level & Trainee
['name' => 'Graduate Engineer Trainee - Chemical', 'description' => 'Training for chemical graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Engineering Intern', 'description' => 'Internship in chemical engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemistry Intern', 'description' => 'Internship in chemistry', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Lab Assistant - Chemical', 'description' => 'Assist in chemical lab', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Lab Technician', 'description' => 'Work in chemical lab', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Junior Chemist', 'description' => 'Entry-level chemist', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Chemical Plant Trainee', 'description' => 'Training in chemical plant', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
['name' => 'Process Trainee', 'description' => 'Training in process engineering', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
];

        
        // Insert in chunks for better performance
        $chunks = array_chunk($positions, 50);
        
        foreach ($chunks as $chunk) {
            DB::table('positions')->insert($chunk);
        }
        
        $this->command->info('Positions seeded successfully! Total: ' . count($positions));
    }
}