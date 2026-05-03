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
            
            // ========== Data & Analytics ==========
            ['name' => 'Data Scientist', 'description' => 'Analyze complex data and build predictive models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Data Analyst', 'description' => 'Interpret data and generate insights', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business Analyst', 'description' => 'Bridge business needs with technical solutions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Data Engineer', 'description' => 'Build and maintain data pipelines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Machine Learning Engineer', 'description' => 'Develop and deploy ML models', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'AI Specialist', 'description' => 'Work on artificial intelligence solutions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Design & Creative ==========
            ['name' => 'UI/UX Designer', 'description' => 'Design user interfaces and experiences', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Graphic Designer', 'description' => 'Create visual concepts and designs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Web Designer', 'description' => 'Design websites and web interfaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Product Designer', 'description' => 'Design product experiences and interfaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Motion Graphics Designer', 'description' => 'Create animated graphics and videos', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Video Editor', 'description' => 'Edit and produce video content', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Art Director', 'description' => 'Lead creative direction and visual strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Digital Marketing ==========
            ['name' => 'Digital Marketing Manager', 'description' => 'Manage digital marketing strategies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'SEO Specialist', 'description' => 'Optimize websites for search engines', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Social Media Manager', 'description' => 'Manage social media presence and engagement', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Content Writer', 'description' => 'Create engaging content for various platforms', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PPC Specialist', 'description' => 'Manage pay-per-click advertising campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Email Marketing Specialist', 'description' => 'Manage email marketing campaigns', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Marketing Analyst', 'description' => 'Analyze marketing data and ROI', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Brand Manager', 'description' => 'Manage brand strategy and positioning', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Sales & Business Development ==========
            ['name' => 'Sales Executive', 'description' => 'Generate leads and close sales', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business Development Manager', 'description' => 'Identify and develop business opportunities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Account Manager', 'description' => 'Manage client accounts and relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sales Manager', 'description' => 'Lead sales team and achieve targets', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Regional Sales Manager', 'description' => 'Manage sales operations in a region', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Key Account Manager', 'description' => 'Manage key strategic accounts', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Inside Sales Representative', 'description' => 'Handle sales via phone and email', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sales Director', 'description' => 'Lead overall sales strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Human Resources ==========
            ['name' => 'HR Executive', 'description' => 'Handle HR operations and recruitment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'HR Manager', 'description' => 'Manage HR department and policies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Recruitment Specialist', 'description' => 'Source and hire talented candidates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Talent Acquisition Manager', 'description' => 'Lead talent acquisition strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Payroll Specialist', 'description' => 'Manage payroll processing', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Training & Development Manager', 'description' => 'Manage employee training programs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Performance Management Specialist', 'description' => 'Manage performance review systems', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'HRBP', 'description' => 'HR Business Partner - Align HR with business goals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Finance & Accounting ==========
            ['name' => 'Accountant', 'description' => 'Manage financial records and transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Senior Accountant', 'description' => 'Handle complex accounting tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Financial Analyst', 'description' => 'Analyze financial data and trends', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Finance Manager', 'description' => 'Manage finance department', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tax Consultant', 'description' => 'Provide tax planning and compliance services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Auditor', 'description' => 'Conduct financial audits', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'CFO', 'description' => 'Chief Financial Officer - Lead financial strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Credit Analyst', 'description' => 'Evaluate creditworthiness of clients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Operations & Project Management ==========
            ['name' => 'Project Manager', 'description' => 'Lead and manage projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Product Manager', 'description' => 'Manage product lifecycle and strategy', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Operations Manager', 'description' => 'Manage daily operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Program Manager', 'description' => 'Manage multiple related projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Scrum Master', 'description' => 'Facilitate agile development processes', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Delivery Manager', 'description' => 'Ensure project delivery and client satisfaction', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Operations Executive', 'description' => 'Support operational activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Customer Support ==========
            ['name' => 'Customer Support Executive', 'description' => 'Handle customer queries and issues', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Customer Service Manager', 'description' => 'Manage customer service team', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Technical Support Engineer', 'description' => 'Provide technical assistance to customers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Customer Success Manager', 'description' => 'Ensure customer satisfaction and retention', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Call Center Representative', 'description' => 'Handle inbound/outbound calls', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Healthcare ==========
            ['name' => 'Doctor', 'description' => 'Provide medical care and treatment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nurse', 'description' => 'Provide patient care and support', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pharmacist', 'description' => 'Dispense medications and advise patients', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Medical Transcriptionist', 'description' => 'Transcribe medical records', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Healthcare Administrator', 'description' => 'Manage healthcare facility operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lab Technician', 'description' => 'Conduct medical laboratory tests', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Physiotherapist', 'description' => 'Provide physical therapy treatment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Education & Teaching ==========
            ['name' => 'Teacher', 'description' => 'Educate students in school setting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Professor', 'description' => 'Teach at college/university level', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Online Tutor', 'description' => 'Provide online teaching services', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Academic Counselor', 'description' => 'Guide students in academic matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Curriculum Developer', 'description' => 'Develop educational curriculum', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Principal', 'description' => 'Lead educational institution', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Banking & Insurance ==========
            ['name' => 'Bank Teller', 'description' => 'Handle customer banking transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Relationship Manager', 'description' => 'Manage banking relationships', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Loan Officer', 'description' => 'Process loan applications', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Insurance Agent', 'description' => 'Sell insurance policies', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Wealth Manager', 'description' => 'Manage investment portfolios', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Branch Manager', 'description' => 'Manage bank branch operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Legal ==========
            ['name' => 'Lawyer', 'description' => 'Provide legal advice and representation', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Legal Advisor', 'description' => 'Provide legal guidance to organizations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Paralegal', 'description' => 'Support legal professionals', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Corporate Lawyer', 'description' => 'Handle corporate legal matters', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Real Estate & Construction ==========
            ['name' => 'Real Estate Agent', 'description' => 'Facilitate property transactions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Civil Engineer', 'description' => 'Design and oversee construction projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Architect', 'description' => 'Design buildings and structures', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Site Supervisor', 'description' => 'Supervise construction sites', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Interior Designer', 'description' => 'Design interior spaces', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Quantity Surveyor', 'description' => 'Manage construction costs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Manufacturing ==========
            ['name' => 'Production Manager', 'description' => 'Manage manufacturing production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Quality Control Inspector', 'description' => 'Ensure product quality', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Maintenance Engineer', 'description' => 'Maintain manufacturing equipment', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Supply Chain Manager', 'description' => 'Manage supply chain operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Logistics Coordinator', 'description' => 'Coordinate logistics activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Warehouse Manager', 'description' => 'Manage warehouse operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Hospitality ==========
            ['name' => 'Hotel Manager', 'description' => 'Manage hotel operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Chef', 'description' => 'Prepare and manage kitchen operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Restaurant Manager', 'description' => 'Manage restaurant operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Front Office Manager', 'description' => 'Manage front desk operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Housekeeping Supervisor', 'description' => 'Supervise housekeeping staff', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Event Planner', 'description' => 'Plan and coordinate events', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Logistics & Transportation ==========
            ['name' => 'Driver', 'description' => 'Operate vehicles for transport', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Delivery Boy', 'description' => 'Deliver packages to customers', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fleet Manager', 'description' => 'Manage vehicle fleet', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Logistics Manager', 'description' => 'Manage logistics operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Supply Chain Coordinator', 'description' => 'Coordinate supply chain activities', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Retail ==========
            ['name' => 'Store Manager', 'description' => 'Manage retail store operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sales Associate', 'description' => 'Assist customers in retail setting', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cashier', 'description' => 'Process customer payments', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Visual Merchandiser', 'description' => 'Design store displays', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Inventory Manager', 'description' => 'Manage inventory levels', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Media & Entertainment ==========
            ['name' => 'Journalist', 'description' => 'Report news stories', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'News Anchor', 'description' => 'Present news on television', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Photographer', 'description' => 'Capture photographs', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Actor', 'description' => 'Perform in films or television', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Singer', 'description' => 'Perform vocal music', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Music Composer', 'description' => 'Create musical compositions', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Agriculture ==========
            ['name' => 'Farm Manager', 'description' => 'Manage farm operations', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Agricultural Officer', 'description' => 'Provide agricultural guidance', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Agronomist', 'description' => 'Study crop production', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Freelance & Gig Economy ==========
            ['name' => 'Freelancer', 'description' => 'Work independently on projects', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Virtual Assistant', 'description' => 'Provide administrative support remotely', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Consultant', 'description' => 'Provide expert advice', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Entry Level ==========
            ['name' => 'Trainee', 'description' => 'Learn and assist in various tasks', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Intern', 'description' => 'Gain practical experience', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fresher', 'description' => 'Entry-level position for new graduates', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Apprentice', 'description' => 'Learn trade through hands-on experience', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
        ];
        
        // Insert in chunks for better performance
        $chunks = array_chunk($positions, 50);
        
        foreach ($chunks as $chunk) {
            DB::table('positions')->insert($chunk);
        }
        
        $this->command->info('Positions seeded successfully! Total: ' . count($positions));
    }
}