<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AllSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the table first to avoid duplicates
        Schema::disableForeignKeyConstraints();
        DB::table('skills')->truncate();
        Schema::enableForeignKeyConstraints();

        $skills = [
            // Programming Languages
            'PHP', 'JavaScript', 'Python', 'Java', 'C++', 'C#', 'Ruby', 'Go', 'Swift', 'Kotlin',
            'TypeScript', 'Rust', 'Scala', 'Perl', 'HTML5', 'CSS3', 'SQL', 'Bash/Shell', 'PowerShell',
            'Dart', 'R', 'MATLAB', 'Groovy', 'Lua', 'Objective-C',

            // Frameworks & Libraries
            'Laravel', 'React', 'Angular', 'Vue.js', 'Node.js', 'Express.js', 'Django', 'Flask',
            'Spring Boot', 'ASP.NET Core', 'Ruby on Rails', 'jQuery', 'Bootstrap', 'Tailwind CSS',
            'Next.js', 'Nuxt.js', 'Svelte', 'NestJS', 'FastAPI', 'CodeIgniter', 'Symfony',
            'CakePHP', 'Yii', 'Phoenix', 'Play Framework',

            // Databases
            'MySQL', 'PostgreSQL', 'MongoDB', 'Oracle', 'SQL Server', 'Firebase', 'Redis',
            'Elasticsearch', 'Cassandra', 'SQLite', 'MariaDB', 'DynamoDB', 'CouchDB', 'Neo4j', 'ArangoDB',

            // Cloud & DevOps
            'AWS', 'Microsoft Azure', 'Google Cloud Platform', 'Docker', 'Kubernetes', 'Jenkins',
            'Git', 'GitHub', 'GitLab', 'Bitbucket', 'CI/CD Pipelines', 'Terraform', 'Ansible',
            'Puppet', 'Chef', 'Prometheus', 'Grafana', 'Nagios', 'CircleCI', 'Travis CI',
            'AWS EC2', 'AWS S3', 'AWS Lambda', 'AWS RDS', 'Azure Functions', 'Google Cloud Run',
            'DigitalOcean', 'GitHub Actions', 'GitLab CI/CD', 'ELK Stack',

            // Design
            'Adobe Photoshop', 'Adobe Illustrator', 'Figma', 'Adobe XD', 'Sketch', 'Adobe InDesign',
            'Adobe Premiere Pro', 'Adobe After Effects', 'Blender', '3ds Max', 'AutoCAD', 'Canva',
            'CorelDRAW', 'GIMP', 'Inkscape', 'DaVinci Resolve', 'Final Cut Pro', 'Lightroom',

            // Business & Management
            'Project Management', 'Agile Methodology', 'Scrum', 'Kanban', 'Leadership', 'Team Management',
            'Business Analysis', 'Strategic Planning', 'Operations Management', 'Financial Analysis',
            'Risk Management', 'Change Management', 'Product Management', 'Stakeholder Management',
            'Budgeting', 'Forecasting',

            // Marketing & SEO
            'SEO', 'Google Analytics', 'Content Marketing', 'Social Media Marketing', 'Email Marketing',
            'PPC Advertising', 'SEM', 'Copywriting', 'Brand Strategy', 'Digital Marketing',
            'Marketing Automation', 'HubSpot', 'Mailchimp', 'Hootsuite', 'Buffer', 'SEMrush', 'Ahrefs', 'Moz',
            'Online Marketing', 'Internet Marketing', 'Search Engine Optimization', 'On-Page SEO',
            'Off-Page SEO', 'Technical SEO', 'Local SEO', 'E-commerce SEO', 'International SEO',
            'Keyword Research', 'Keyword Analysis', 'Backlink Building', 'Link Building', 'Guest Posting',
            'Search Engine Marketing', 'Pay Per Click', 'PPC', 'Google Ads', 'Google AdWords', 'Bing Ads',
            'Display Advertising', 'Remarketing', 'Retargeting', 'Bid Management', 'Ad Copywriting',
            'Ad Campaign Management', 'SMM', 'Facebook Marketing', 'Instagram Marketing', 'Twitter Marketing',
            'LinkedIn Marketing', 'YouTube Marketing', 'Pinterest Marketing', 'Snapchat Marketing',
            'TikTok Marketing', 'WhatsApp Marketing', 'Telegram Marketing', 'Social Media Management',
            'Social Media Advertising', 'Facebook Ads', 'Instagram Ads', 'LinkedIn Ads', 'Twitter Ads',
            'Pinterest Ads', 'Snapchat Ads', 'TikTok Ads', 'Social Media Analytics', 'Community Management',
            'Social Listening', 'Influencer Marketing', 'Brand Advocacy', 'User Generated Content',
            'Social Media Strategy', 'Content Calendar Management', 'Social Media Tools', 'Sprout Social',
            'Later', 'Metricool', 'Content Strategy', 'Content Creation', 'Content Writing', 'Blog Writing',
            'Article Writing', 'Web Content Writing', 'Landing Page Copywriting', 'Sales Copywriting',
            'Email Copywriting', 'Creative Writing', 'Storytelling', 'Video Script Writing',
            'Podcast Script Writing', 'E-book Writing', 'Whitepaper Writing', 'Case Study Writing',
            'Press Release Writing', 'Newsletter Writing', 'Content Distribution', 'Content Promotion',
            'Content Curation', 'Content Optimization', 'Content Repurposing', 'Infographic Creation',
            'Visual Content Creation', 'Email Campaign Management', 'Email Automation', 'Email List Building',
            'Email Segmentation', 'Personalization', 'Drip Campaigns', 'Newsletter Marketing',
            'Transactional Emails', 'Email Design', 'Email Deliverability', 'A/B Testing Emails',
            'Email Analytics', 'Sendinblue', 'Constant Contact', 'ConvertKit', 'ActiveCampaign',
            'GetResponse', 'HubSpot Email', 'Marketing Analytics', 'Data Analytics', 'Google Tag Manager',
            'Google Data Studio', 'Looker Studio', 'Adobe Analytics', 'Mixpanel', 'Amplitude', 'Hotjar',
            'Crazy Egg', 'Heatmap Analysis', 'Conversion Tracking', 'Goal Setting', 'Funnel Analysis',
            'Cohort Analysis', 'Attribution Modeling', 'ROI Analysis', 'Marketing Reporting',
            'Dashboard Creation', 'KPI Tracking', 'Brand Management', 'Brand Identity', 'Brand Positioning',
            'Brand Awareness', 'Brand Building', 'Brand Equity', 'Brand Voice Development',
            'Marketing Strategy', 'Strategic Marketing', 'Marketing Planning', 'Go-to-Market Strategy',
            'Market Research', 'Market Analysis', 'Competitor Analysis', 'SWOT Analysis', 'PEST Analysis',
            'Target Audience Identification', 'Buyer Persona Development', 'Customer Journey Mapping',
            'Marketing Mix', '4Ps of Marketing', '7Ps of Marketing', 'Marketing Funnel', 'Conversion Funnel',
            'AIDA Model', 'Customer Acquisition', 'Customer Retention', 'Customer Loyalty',
            'Traditional Marketing', 'Print Marketing', 'Newspaper Advertising', 'Magazine Advertising',
            'Billboard Advertising', 'Outdoor Advertising', 'Television Advertising', 'Radio Advertising',
            'Direct Mail Marketing', 'Brochure Marketing', 'Flyer Distribution', 'Hoarding Advertising',
            'Event Marketing', 'Trade Show Marketing', 'Exhibition Marketing', 'Sponsorship Marketing',
            'Telemarketing', 'Inbound Marketing', 'Outbound Marketing', 'Lead Generation', 'Lead Nurturing',
            'Lead Scoring', 'Cold Calling', 'Sales Prospecting', 'Account Based Marketing', 'ABM',
            'Product Marketing', 'Product Launch', 'Product Positioning', 'Product Messaging',
            'Product Pricing', 'Product Packaging', 'Sales Enablement', 'Product Demonstration',
            'Public Relations', 'PR', 'Media Relations', 'Press Release Distribution', 'Crisis Management',
            'Corporate Communications', 'Internal Communications', 'External Communications',
            'Media Monitoring', 'Reputation Management', 'Online Reputation Management', 'Brand Reputation',
            'Video Marketing', 'Video Production', 'Video Editing', 'Video SEO', 'Live Video Streaming',
            'Webinar Marketing', 'Vlog Creation', 'Tutorial Videos', 'Explainer Videos', 'Animated Videos',
            'Mobile Marketing', 'SMS Marketing', 'MMS Marketing', 'Push Notifications', 'In-App Marketing',
            'App Store Optimization', 'ASO', 'QR Code Marketing', 'Affiliate Marketing',
            'Partnership Marketing', 'Referral Marketing', 'Ambassador Program', 'Affiliate Program Management',
            'Partner Relationship Management', 'CRM', 'Customer Relationship Management',
            'HubSpot Marketing', 'Salesforce Marketing Cloud', 'Marketo', 'Pardot', 'Zoho CRM', 'Salesforce',
            'Automation Workflows', 'Lead Management', 'Customer Data Platform', 'E-commerce Marketing',
            'Amazon Marketing', 'Flipkart Marketing', 'Shopify Marketing', 'WooCommerce Marketing',
            'Product Listing Optimization', 'Amazon PPC', 'Shopping Feed Management', 'Google Shopping',
            'Abandoned Cart Recovery', 'Cross Selling', 'Upselling', 'Customer Reviews Management',
            'Marketing Tools', 'SpyFu', 'BuzzSumo', 'Adobe Creative Suite', 'Google Trends',
            'AnswerThePublic', 'Ubersuggest', 'Screaming Frog', 'Yoast SEO', 'Rank Math', 'Surfer SEO',
            'Grammarly', 'Trello', 'Asana', 'Monday.com', 'Creativity', 'Presentation Skills',
            'Negotiation Skills', 'Team Collaboration', 'Customer Focus', 'Empathy', 'Persuasion',
            'Curiosity', 'Resilience',

            // Data Science & AI
            'Machine Learning', 'Deep Learning', 'Artificial Intelligence', 'Data Analysis',
            'Data Visualization', 'TensorFlow', 'PyTorch', 'Pandas', 'NumPy', 'Scikit-learn', 'Keras',
            'Tableau', 'Power BI', 'Apache Spark', 'Hadoop', 'Data Mining', 'NLP', 'Computer Vision',
            'LLM', 'Kafka',

            // Mobile Development
            'iOS Development', 'Android Development', 'React Native', 'Flutter', 'SwiftUI',
            'Kotlin Multiplatform', 'Xamarin', 'Ionic', 'Cordova', 'NativeScript',

            // Gaming Development
            'Unity', 'Unreal Engine', 'Game Design', '3D Modeling', 'Game Physics', 'Shader Programming',
            'Godot', 'CryEngine', 'Cocos2d', 'Three.js', 'WebGL', 'OpenGL',

            // Security
            'Cybersecurity', 'Ethical Hacking', 'Penetration Testing', 'Network Security', 'Cryptography',
            'Application Security', 'Cloud Security', 'DevSecOps', 'ISO 27001', 'GDPR Compliance',
            'SOC 2', 'OWASP', 'Vulnerability Assessment', 'Incident Response', 'SIEM', 'Burp Suite',
            'Metasploit', 'Wireshark', 'Nmap', 'Kali Linux',

            // Testing & QA
            'Unit Testing', 'Integration Testing', 'E2E Testing', 'Jest', 'PHPUnit', 'Selenium',
            'Cypress', 'JUnit', 'PyTest', 'Mocha', 'Chai', 'Karma', 'Jasmine', 'Postman', 'SoapUI',
            'Manual Testing', 'Automated Testing', 'Playwright', 'Performance Testing', 'Load Testing',
            'JMeter',

            // Office & Productivity
            'Microsoft Office', 'Microsoft Excel', 'Microsoft PowerPoint', 'Microsoft Word',
            'Microsoft Outlook', 'Google Workspace', 'Slack', 'Notion', 'ClickUp', 'Zoom',
            'Microsoft Teams', 'Confluence',

            // Languages
            'English', 'Spanish', 'French', 'German', 'Chinese', 'Japanese', 'Arabic', 'Hindi',
            'Russian', 'Italian', 'Portuguese', 'Dutch', 'Korean', 'Turkish', 'Vietnamese', 'Thai', 'Polish',

            // Soft Skills
            'Communication', 'Teamwork', 'Problem Solving', 'Critical Thinking', 'Creativity',
            'Time Management', 'Adaptability', 'Emotional Intelligence', 'Conflict Resolution',
            'Negotiation', 'Interpersonal Skills', 'Presentation Skills', 'Decision Making',
            'Stress Management', 'Work Ethic',

            // E-commerce
            'Shopify', 'WooCommerce', 'Magento', 'Salesforce Commerce', 'BigCommerce', 'PrestaShop',
            'OpenCart', 'Squarespace', 'Wix E-commerce',

            // CMS
            'WordPress', 'Drupal', 'Joomla', 'Webflow', 'Ghost', 'Contentful', 'Strapi', 'Sanity', 'Kentico',

            // Networking
            'TCP/IP', 'DNS', 'DHCP', 'Routing', 'Switching', 'Firewalls', 'VPN', 'Load Balancing',
            'Cisco', 'Juniper', 'Firewall',

            // ERP Systems
            'SAP', 'Oracle ERP', 'Microsoft Dynamics', 'Odoo', 'NetSuite', 'Infor', 'Epicor',

            // Additional Skills
            'Technical Writing', 'Customer Support', 'Sales', 'Recruiting', 'Training & Development',
            'Public Speaking', 'Procurement', 'Supply Chain Management', 'Logistics', 'Quality Assurance',
            'Compliance', 'Auditing', 'Research', 'Data Entry', 'Virtual Assistance', 'Bookkeeping',
            'Payroll Processing', 'Logistics Management', 'Inventory Control', 'Operations Research',
            'Facility Layout', 'Material Handling', 'Ergonomics', 'Work Study', 'Time and Motion Study',
            'Quality Control', 'Statistical Process Control', 'Total Quality Management', 'Just in Time',
            'Value Stream Mapping', 'Root Cause Analysis', 'FMEA', 'Simulation Modeling', 'Arena Simulation',
            'AnyLogic',

            // Engineering - Mechanical
            'Mechanical Design', 'Thermodynamics', 'Fluid Mechanics', 'Solid Mechanics', 'Kinematics',
            'Dynamics', 'Heat Transfer', 'Material Science', 'Manufacturing Processes', 'Machine Design',
            'Vibrations Analysis', 'Finite Element Analysis', 'Computational Fluid Dynamics',
            'Strength of Materials', 'Engineering Drawing', 'GD&T', 'Mechatronics', 'Robotics',
            'Control Systems', 'Hydraulics', 'Pneumatics', 'Refrigeration', 'HVAC',

            // CAD Software
            'SolidWorks', 'CATIA', 'Creo', 'Siemens NX', 'Inventor', 'Fusion 360', 'Solid Edge',
            'FreeCAD', 'DraftSight', 'Onshape', 'Rhino 3D', 'SketchUp',

            // Simulation & Analysis
            'ANSYS', 'Abaqus', 'COMSOL Multiphysics', 'LS-DYNA', 'OpenFOAM', 'SimScale', 'ADAMS',
            'MATLAB', 'Simulink', 'Nastran', 'Fluent',

            // Manufacturing
            'CNC Machining', '3D Printing', 'Injection Molding', 'Casting', 'Forging', 'Welding',
            'Sheet Metal Fabrication', 'Laser Cutting', 'Plasma Cutting', 'Water Jet Cutting',
            'Turning Operations', 'Milling Operations', 'Grinding', 'EDM', 'Rapid Prototyping',
            'Tool Design', 'Lean Manufacturing', 'Six Sigma', 'Kaizen', '5S Methodology', 'TQM',

            // Materials
            'Metallurgy', 'Polymer Science', 'Composite Materials', 'Ceramics', 'Nanomaterials',
            'Heat Treatment', 'Surface Engineering', 'Corrosion Engineering', 'Failure Analysis',
            'Non-Destructive Testing', 'Material Testing',

            // Automotive
            'Automotive Design', 'Engine Design', 'Transmission Systems', 'Chassis Design',
            'Suspension Systems', 'Brake Systems', 'Vehicle Dynamics', 'Electric Vehicle Design',
            'Battery Technology', 'Autonomous Vehicles',

            // Aerospace
            'Aerodynamics', 'Propulsion Systems', 'Aircraft Design', 'Spacecraft Design',
            'Rocket Propulsion', 'Flight Mechanics', 'Propulsion', 'Aircraft Structures',
            'Orbital Mechanics', 'Avionics', 'Aerospace Materials', 'Composite Structures',
            'Wind Tunnel Testing', 'CFD for Aerospace', 'Aeroelasticity', 'Satellite Technology',
            'Guidance Navigation Control', 'Unmanned Aerial Vehicles',

            // Electrical Engineering
            'Circuit Design', 'Power Systems', 'Electrical Machines', 'Power Electronics',
            'Digital Signal Processing', 'Embedded Systems', 'Microcontrollers', 'PLC Programming',
            'SCADA Systems', 'Renewable Energy Systems', 'Solar Power Systems', 'Wind Energy Systems',
            'Electrical Wiring', 'Earthing & Grounding', 'Switchgear Design', 'Transformer Design',
            'Motor Control', 'VFD Drives', 'Electrical Safety', 'Lighting Design', 'Electrical Estimation',
            'MATLAB/Simulink', 'ETAP', 'PSCAD', 'AutoCAD Electrical', 'EPLAN', 'Smart Grid Technology',
            'High Voltage Engineering', 'Ohm Law & Kirchhoff Laws', 'AC/DC Circuit Analysis',
            'Electrical Safety & Lockout/Tagout (LOTO)', 'Blueprint & Schematic Reading',
            'National Electrical Code (NEC)', 'Residential Wiring', 'Commercial Wiring', 'Industrial Wiring',
            'Conduit Bending & Installation', 'Cable Tray Installation', 'Fiber Optic Cabling',
            'Low Voltage Systems', 'Multimeter Usage', 'Clamp Meter Usage',
            'Insulation Resistance Testing (Megger)', 'Ground Fault Testing', 'Oscilloscope Operation',
            'Thermal Imaging for Electrical Systems', 'Power Quality Analysis', 'Motor Control Circuits',
            'VFD (Variable Frequency Drive) Setup', 'Motor Winding Testing', 'Servo & Stepper Motor Tuning',
            'Soft Starter Installation', 'Breaker Panel Installation', 'Switchgear & Switchboard Operation',
            'Transformer Installation & Testing', 'Generator Installation', 'UPS (Uninterruptible Power Supply) Maintenance',
            'Power Factor Correction', 'Solar PV System Design', 'Solar Panel Installation',
            'Inverter Installation & Configuration', 'Battery Storage Systems', 'Wind Turbine Electrical Maintenance',
            'High Voltage Switching', 'Substation Maintenance', 'Circuit Breaker Testing',
            'Relay Protection & Calibration', 'Lineworker (Lineman) Skills', 'Pole Climbing & Rescue',
            'Home Automation Systems', 'HMI Configuration', 'Industrial Communication Protocols (Modbus, Profibus)',
            'IoT Electrical Devices', 'Lighting Design & Installation (LED, Fluorescent, HID)',
            'Emergency Lighting Systems', 'Fire Alarm System Installation', 'Smoke Detector Wiring',
            'Preventive Electrical Maintenance', 'Arc Flash Hazard Analysis', 'NFPA 70E Compliance',
            'Electrical Permitting & Inspection',

            // Civil Engineering
            'Structural Analysis', 'Reinforced Concrete Design', 'Steel Structure Design',
            'Geotechnical Engineering', 'Soil Mechanics', 'Foundation Engineering',
            'Transportation Engineering', 'Highway Engineering', 'Railway Engineering', 'Bridge Engineering',
            'Tunnel Engineering', 'Hydrology', 'Water Resources Engineering', 'Hydraulic Structures',
            'Environmental Engineering', 'Wastewater Treatment', 'Water Supply Engineering',
            'Construction Management', 'Project Planning', 'Quantity Surveying', 'Cost Estimation',
            'Construction Materials', 'Building Construction', 'Surveying', 'Levelling', 'GIS',
            'Remote Sensing', 'AutoCAD Civil', 'Revit', 'STAAD Pro', 'ETABS', 'SAP2000', 'Primavera',
            'MS Project', 'Building Information Modeling', 'Earthquake Engineering', 'Urban Planning',
            'Town Planning', 'Coastal Engineering', 'Offshore Structure Design',
            'Site Surveying & Layout', 'Excavation & Trenching', 'Land Clearing & Grubbing',
            'Soil Compaction Testing', 'Grading & Leveling', 'Erosion Control Installation',
            'Formwork Installation', 'Rebar Placement & Tying', 'Concrete Mixing & Pouring',
            'Concrete Finishing (Screeding, Floating, Troweling)', 'Concrete Curing', 'Concrete Cutting & Coring',
            'Stamped Concrete', 'Shotcrete / Gunite Application', 'Brick Laying', 'Block Wall Construction',
            'Stone Masonry', 'Mortar Mixing & Application', 'Joint Finishing (Pointing)',
            'Waterproofing Masonry Walls', 'Framing (Walls, Roofs, Floors)', 'Roof Truss Installation',
            'Formwork Carpentry', 'Door & Window Installation', 'Cabinet Installation',
            'Flooring Installation (Hardwood, Laminate)', 'Crown Molding & Trim Work', 'Scaffolding Erection',
            'Structural Steel Erection', 'Metal Decking Installation', 'Handrail & Guardrail Installation',
            'Rebar Cutting & Bending', 'Drywall Installation & Taping', 'Plastering',
            'Painting (Roller, Spray, Brush)', 'Wallpaper Installation', 'Tile Setting (Floor & Wall)',
            'Grouting & Sealing', 'Suspended Ceiling Installation', 'Stucco Application',
            'Shingle Roofing Installation', 'Metal Roofing Installation', 'Flat Roof Membrane (EPDM, TPO)',
            'Gutter & Downspout Installation', 'Siding Installation (Vinyl, Fiber Cement)', 'Roof Flashing',
            'Pipe Cutting & Threading', 'PVC/CPVC Pipe Installation', 'Copper Pipe Soldering',
            'Fixture Installation (Sinks, Toilets, Showers)', 'Drainage System Installation',
            'Water Heater Installation', 'Leak Detection & Repair', 'Conduit Bending & Installation',
            'Wire Pulling & Termination', 'Outlet & Switch Installation', 'Circuit Breaker Panel Installation',
            'Lighting Fixture Installation', 'Rough Electrical Wiring', 'Ductwork Installation',
            'HVAC Unit Placement', 'Refrigerant Line Installation', 'Ventilation System Setup',
            'Excavator Operation', 'Bulldozer Operation', 'Backhoe Operation', 'Skid Steer Loader Operation',
            'Crane Operation (Mobile/Tower)', 'Forklift Operation', 'Dump Truck Operation',
            'OSHA Safety Standards', 'Fall Protection Systems', 'Confined Space Entry',
            'Personal Protective Equipment (PPE)', 'Scaffold Safety Inspection', 'Job Hazard Analysis (JHA)',
            'First Aid & CPR', 'Construction Blueprint Reading', 'Material Takeoff', 'Construction Scheduling',
            'Quality Control Inspection', 'Subcontractor Coordination', 'Project Documentation',
            'Selective Demolition', 'Structural Demolition', 'Debris Removal & Disposal',
            'Concrete Breaking (Jackhammer)', 'Site Cleanup & Restoration',

            // Plumbing
            'Plumbing Blueprint Reading', 'Local Plumbing Codes & Regulations', 'Pipe Sizing & Calculations',
            'Water Supply System Design', 'Drainage & Venting Principles', 'Copper Pipe Soldering & Brazing',
            'PEX Pipe Crimping & Expansion', 'Galvanized Steel Pipe Threading',
            'Cast Iron Pipe Joining (Hub & Spigot)', 'HDPE Pipe Fusion Welding', 'Stainless Steel Pipe Installation',
            'Pipe Bending (Manual & Hydraulic)', 'Toilet Installation & Repair', 'Sink & Faucet Installation',
            'Shower & Bathtub Installation', 'Urinal Installation', 'Bidet Installation',
            'Kitchen Sink & Garbage Disposal', 'Laundry Tray & Washing Machine Hookup', 'Drinking Fountain Installation',
            'Drain Snaking & Augering', 'Hydro Jetting (High Pressure Drain Cleaning)', 'Sewer Camera Inspection',
            'Drainage Pipe Slope Calculation', 'French Drain Installation', 'Sewer Line Repair & Replacement',
            'Trenchless Sewer Repair (Pipe Lining/Bursting)', 'Catch Basin & Storm Drain Installation',
            'Grease Trap Installation', 'Tank Water Heater Installation', 'Tankless Water Heater Installation',
            'Heat Pump Water Heater Installation', 'Solar Water Heater Installation', 'Boiler Installation & Repair',
            'Expansion Tank Installation', 'Temperature & Pressure Relief Valve', 'Water Heater Anode Rod Replacement',
            'Natural Gas Pipe Installation', 'LPG/Propane Pipe Installation', 'Gas Leak Detection (Soap Test & Electronic)',
            'Gas Appliance Hookup (Stove, Dryer, Heater)', 'Gas Shutoff Valve Installation', 'Gas Pressure Testing',
            'Sump Pump Installation & Repair', 'Sewage Ejector Pump Installation', 'Well Pump Installation (Submersible/Jet)',
            'Circulating Pump Installation', 'Pressure Tank Installation', 'Pump Pressure Switch Adjustment',
            'Backflow Preventer Installation', 'Backflow Testing & Certification', 'Reduced Pressure Zone (RPZ) Valve Repair',
            'Double Check Valve Assembly', 'Gate Valve Repair & Replacement', 'Ball Valve Installation',
            'Globe Valve Repair', 'Check Valve Installation', 'Pressure Reducing Valve (PRV) Adjustment',
            'Cartridge & Ceramic Disc Faucet Repair', 'Compression Faucet Repair', 'Water Leak Detection (Visual & Acoustic)',
            'Slab Leak Detection & Repair', 'Underground Pipe Leak Repair', 'Pipe Epoxy Lining (Pipe Relining)',
            'Thread Sealant & Teflon Tape Application', 'Commercial Kitchen Plumbing',
            'Medical Gas Pipe Installation (Oxygen, Vacuum)', 'Industrial Process Piping', 'Cooling Tower Piping',
            'Fire Sprinkler System Installation', 'Compressed Air Piping', 'Underground Rough-In Plumbing',
            'Above Ground Rough-In Plumbing', 'Pipe Bedding & Backfill', 'Trenching for Plumbing Lines',
            'Concrete Slab Pipe Installation (Stub-Outs)', 'Pipe Threading Machine Operation',
            'Pipe Cutting Tools (Hacksaw, Cutter, Grinder)', 'Soldering Torch Operation', 'Drain Snake (Auger) Operation',
            'Hydro Jetting Machine Operation', 'Pipe Bender Operation', 'Pipe Locator & Tracer Usage',
            'Bathroom Rough Plumbing', 'Kitchen Rough Plumbing', 'Shower Valve Installation',
            'Freestanding Tub Installation', 'Wet Room & Linear Drain Installation', 'Water Softener Installation',
            'Reverse Osmosis System Installation', 'Water Filtration System Installation', 'UV Water Purifier Installation',
            'Plumbing Safety (PPE, Confined Space)', 'Lead & Copper Rule Compliance', 'Cross-Connection Control',
            'Asbestos Pipe Handling (Awareness)', 'Plumbing Permit & Inspection Process', 'Customer Plumbing Diagnostics',
            'Plumbing Estimate & Bidding', 'Emergency Plumbing Response',

            // Computer Engineering / IT
            'Programming', 'Data Structures', 'Algorithms', 'Operating Systems', 'Computer Networks',
            'Database Management', 'Software Engineering', 'Web Development', 'Mobile App Development',
            'Cloud Computing', 'Data Science', 'Blockchain', 'IoT', 'DevOps', 'Azure', 'Google Cloud',
            'React.js', 'Vue.js', 'Material UI', 'Sass/SCSS', 'Webpack', 'Vite', 'Playwright',
            'Agile', 'JIRA', 'UI Design', 'UX Design', 'Wireframing', 'Prototyping', 'User Research',
            'Linux', 'Windows Server', 'Ubuntu', 'CentOS', 'Red Hat', 'Active Directory', 'Apache',
            'Nginx', 'VMware', 'Hyper-V', 'Ethereum', 'Smart Contracts', 'Solidity', 'AR/VR',
            'Web3.js', 'Microservices', 'Serverless', 'WebAssembly',

            // Electronics Engineering
            'Analog Electronics', 'Digital Electronics', 'Microprocessors', 'VLSI Design', 'FPGA Design',
            'PCB Design', 'Arduino', 'Raspberry Pi', 'Internet of Things', 'Signal Processing',
            'Communication Systems', 'Wireless Communication', 'Optical Communication', 'Satellite Communication',
            'Microwave Engineering', 'Antenna Design', 'RF Engineering', 'Instrumentation', 'Sensors Technology',
            'Circuit Simulation', 'Altium Designer', 'EAGLE', 'KiCad', 'SPICE Simulation',

            // Chemical Engineering
            'Chemical Process Design', 'Process Simulation', 'Reaction Engineering', 'Mass Transfer',
            'Chemical Thermodynamics', 'Process Control', 'Plant Design', 'Petroleum Refining',
            'Polymer Engineering', 'Pharmaceutical Engineering', 'Food Engineering', 'Biochemical Engineering',
            'Waste Management', 'Water Treatment', 'Process Safety', 'Hazard Analysis', 'Risk Assessment',
            'Aspen Plus', 'CHEMCAD', 'HYSYS', 'Heat Exchanger Design', 'Distillation Column Design',
            'Reactor Design', 'Piping Design', 'P&ID Development',

            // Biomedical Engineering
            'Biomechanics', 'Biomaterials', 'Medical Imaging', 'MRI Technology', 'CT Scan',
            'Ultrasound Technology', 'X-ray Technology', 'Medical Devices', 'Prosthetics Design',
            'Orthopedic Implants', 'Biomedical Signal Processing', 'ECG Analysis', 'EEG Analysis',
            'EMG Analysis', 'Tissue Engineering', 'Rehabilitation Engineering', 'Clinical Engineering',
            'Medical Equipment Maintenance', 'FDA Regulations', 'ISO 13485',

            // Environmental Engineering
            'Environmental Impact Assessment', 'Air Pollution Control', 'Water Pollution Control',
            'Solid Waste Management', 'Hazardous Waste Management', 'Environmental Chemistry',
            'Environmental Microbiology', 'Environmental Modeling', 'Sustainability Engineering',
            'Green Building Design', 'LEED Certification', 'Carbon Footprint Analysis',
            'Life Cycle Assessment', 'Climate Change Mitigation', 'Environmental Auditing',
            'Environmental Law Compliance',

            // Marine Engineering
            'Naval Architecture', 'Ship Design', 'Marine Propulsion', 'Marine Engines', 'Shipbuilding',
            'Offshore Engineering', 'Subsea Engineering', 'Marine Structures', 'Port and Harbor Engineering',
            'Marine Safety', 'Marine Pollution Control',

            // Petroleum Engineering
            'Reservoir Engineering', 'Drilling Engineering', 'Production Engineering', 'Petroleum Geology',
            'Well Logging', 'Oil Refining', 'Natural Gas Engineering', 'Enhanced Oil Recovery',
            'Petrochemical Engineering', 'Offshore Drilling', 'Well Testing', 'Pipeline Engineering',
            'Oil and Gas Safety',

            // Mining Engineering
            'Mine Planning', 'Mine Design', 'Surface Mining', 'Underground Mining', 'Mineral Processing',
            'Rock Mechanics', 'Blasting Technology', 'Mine Ventilation', 'Mine Safety', 'Mineral Economics',
            'Mine Surveying',

            // Textile Engineering
            'Textile Manufacturing', 'Fiber Science', 'Yarn Manufacturing', 'Fabric Manufacturing',
            'Textile Chemistry', 'Textile Dyeing', 'Textile Printing', 'Fashion Technology',
            'Garment Manufacturing', 'Technical Textiles', 'Nonwoven Technology', 'Textile Testing',
            'Quality Control in Textiles',

            // Agricultural Engineering
            'Farm Machinery', 'Irrigation Engineering', 'Agricultural Structures', 'Soil and Water Conservation',
            'Post Harvest Technology', 'Food Processing', 'Greenhouse Technology', 'Precision Agriculture',
            'Drip Irrigation', 'Sprinkler Systems', 'Agricultural Waste Management',

            // Metallurgical Engineering
            'Extractive Metallurgy', 'Physical Metallurgy', 'Mechanical Metallurgy', 'Phase Transformation',
            'Corrosion Engineering', 'Powder Metallurgy', 'Welding Metallurgy', 'Foundry Technology',
            'Alloy Design', 'Metal Forming', 'Materials Characterization',

            // Finance & Accounting
            'Financial Accounting', 'Managerial Accounting', 'Cost Accounting', 'Tax Accounting',
            'Forensic Accounting', 'Bookkeeping', 'General Ledger Management', 'Accounts Payable',
            'Accounts Receivable', 'Bank Reconciliation', 'Petty Cash Management', 'Invoice Processing',
            'Expense Management', 'Trial Balance', 'Journal Entries', 'Financial Reporting',
            'Financial Modeling', 'Financial Forecasting', 'Ratio Analysis', 'Variance Analysis',
            'Trend Analysis', 'Comparative Analysis', 'Break-even Analysis', 'Cash Flow Analysis',
            'Profitability Analysis', 'Cost-benefit Analysis', 'What-if Analysis', 'Sensitivity Analysis',
            'Scenario Analysis', 'Consolidation', 'MIS Reporting', 'KPI Development', 'Annual Budget Preparation',
            'Zero-based Budgeting', 'Incremental Budgeting', 'Activity-based Budgeting', 'Rolling Forecast',
            'Budget Monitoring', 'Budget Variance Analysis', 'Capital Budgeting', 'Operating Budget',
            'Cash Budget', 'Sales Budget', 'Production Budget', 'Expense Budget', 'Income Tax', 'Corporate Tax',
            'GST', 'VAT', 'Sales Tax', 'Property Tax', 'Excise Duty', 'Customs Duty', 'TDS', 'Tax Planning',
            'Tax Compliance', 'Tax Filing', 'Tax Audit', 'International Taxation', 'Transfer Pricing',
            'Double Taxation Avoidance', 'Tax Research', 'Tax Returns Preparation', 'Internal Audit',
            'External Audit', 'Statutory Audit', 'Compliance Audit', 'Operational Audit', 'Forensic Audit',
            'Information Systems Audit', 'Risk-based Audit', 'Audit Planning', 'Audit Execution',
            'Audit Reporting', 'Internal Controls Testing', 'Compliance Testing', 'Substantive Testing',
            'Sample Testing', 'Corporate Finance', 'Mergers and Acquisitions', 'Due Diligence', 'Valuation',
            'Business Valuation', 'DCF Valuation', 'Relative Valuation', 'LBO Analysis', 'Capital Raising',
            'Equity Financing', 'Debt Financing', 'IPO Process', 'Private Equity', 'Venture Capital',
            'Hedge Funds', 'Capital Structure', 'Dividend Policy', 'Working Capital Management',
            'Investment Analysis', 'Portfolio Management', 'Asset Allocation', 'Equity Research',
            'Fixed Income Analysis', 'Derivatives', 'Options Trading', 'Futures Trading', 'Swaps',
            'Commodity Trading', 'Forex Trading', 'Stock Trading', 'Mutual Funds', 'Exchange Traded Funds',
            'Real Estate Investment', 'REITs', 'Alternative Investments', 'Technical Analysis',
            'Fundamental Analysis', 'Quantitative Analysis', 'Financial Risk Management', 'Credit Risk',
            'Market Risk', 'Operational Risk', 'Liquidity Risk', 'Interest Rate Risk', 'Currency Risk',
            'Counterparty Risk', 'Value at Risk', 'Stress Testing', 'Risk Mitigation', 'Hedging Strategies',
            'Enterprise Risk Management', 'Commercial Banking', 'Investment Banking', 'Retail Banking',
            'Corporate Banking', 'Private Banking', 'Wealth Management', 'Asset Management', 'Loan Processing',
            'Credit Analysis', 'Underwriting', 'Mortgage Banking', 'Treasury Management', 'Cash Management',
            'Trade Finance', 'Letters of Credit', 'Bank Guarantees', 'KYC Compliance', 'AML Compliance',
            'Customer Due Diligence', 'Life Insurance', 'General Insurance', 'Health Insurance',
            'Property Insurance', 'Liability Insurance', 'Marine Insurance', 'Actuarial Science',
            'Claims Processing', 'Risk Assessment Insurance', 'Premium Calculation', 'Reinsurance',
            'International Finance', 'Foreign Exchange', 'Forex Management', 'Currency Hedging',
            'International Trade Finance', 'Cross-border Transactions', 'FEMA Compliance', 'Export Finance',
            'Import Finance', 'Foreign Direct Investment', 'Foreign Portfolio Investment', 'ECB Guidelines',
            'Tally ERP', 'QuickBooks', 'SAP FICO', 'Oracle Financials', 'Zoho Books', 'Xero',
            'Wave Accounting', 'FreshBooks', 'MYOB', 'Peachtree', 'Advanced Excel', 'Excel VBA',
            'Bloomberg Terminal', 'Reuters', 'QuickBooks Online', 'SAP Concur', 'BlackLine', 'Coupa',
            'GAAP', 'IFRS', 'Ind AS', 'SOX Compliance', 'BASEL III', 'RBI Guidelines', 'SEBI Regulations',
            'Companies Act', 'Financial Compliance', 'Regulatory Reporting', 'Statutory Compliance',
            'ROC Filing', 'MCA Compliance', 'Financial Planning', 'Personal Financial Planning',
            'Retirement Planning', 'Estate Planning', 'Financial Advisory', 'Investment Advisory',
            'Goal Planning', 'Cash Flow Planning', 'Debt Management', 'Insurance Planning',
            'Child Education Planning', 'CA', 'CPA', 'ACCA', 'CMA', 'CFA', 'FRM', 'CFP', 'CIMA', 'CS',
            'ICWA', 'MBA Finance', 'CIA', 'CISA', 'Attention to Detail', 'Analytical Thinking',
            'Numerical Ability', 'Communication Skills', 'Ethical Judgment', 'Confidentiality',
            'Strategic Thinking', 'Business Acumen',

            // CNC & VMC
            'CNC Operation', 'CNC Programming', 'CNC Turning', 'CNC Milling', 'CNC Lathe Machine',
            'CNC Router', 'CNC Grinding', 'CNC Laser Cutting', 'CNC Plasma Cutting', 'CNC Water Jet Cutting',
            'CNC EDM Machine', 'CNC Wire Cut EDM', 'CNC Setup', 'CNC Maintenance', 'CNC Tooling',
            'CNC Fixture Design', 'G-Code Programming', 'M-Code Programming', 'CAM Programming',
            'Mastercam', 'SolidCAM', 'EdgeCAM', 'PowerMILL', 'CATIA CAM', 'NX CAM', 'Fusion 360 CAM',
            'VMC Operation', 'VMC Programming', 'VMC Setup', 'Vertical Machining Center', 'VMC Tool Setting',
            'VMC Work Offset Setting', 'VMC Tool Path Optimization', 'VMC Fixture Design', 'VMC Maintenance',
            'VMC Troubleshooting', '4th Axis VMC', '5th Axis VMC', 'VMC Precision Machining',
            'VMC High Speed Machining', 'HAAS VMC', 'DMG Mori VMC', 'Mazak VMC', 'Fanuc VMC Control',
            'Siemens VMC Control', 'Quality Assurance', 'Inspection', 'Visual Inspection',
            'Dimensional Inspection', 'CMM Programming', 'Vernier Caliper', 'Micrometer', 'Height Gauge',
            'Dial Gauge', 'Vernier Height Gauge', 'Digital Caliper', 'Profile Projector', 'Hardness Testing',
            'Rockwell Hardness Test', 'Brinell Hardness Test', 'Vickers Hardness Test', 'Surface Roughness Testing',
            'Go/No-Go Gauge', 'Plug Gauge', 'Ring Gauge', 'Thread Gauge', 'Feeler Gauge', 'Pneumatic Gauge',
            'Optical Comparator', 'Vision Measurement System', 'ISO 9001 Quality Standard', 'SPC',
            'Quality Documentation', 'Eddy Current Testing', 'First Article Inspection', 'In-process Inspection',
            'Final Inspection', 'Sample Inspection', 'Quality Audit', 'CAPA', '8D Report', 'Poka-Yoke',
            'Machine Setting', 'Machine Setup', 'Tool Setting', 'Offset Setting', 'Work Holding Setup',
            'Jaw Setting', 'Chuck Setting', 'Vice Setting', 'Clamping Setting', 'Fixture Setting',
            'Zero Point Setting', 'Tool Offset Setting', 'Work Offset Setting', 'Tool Length Offset',
            'Tool Diameter Offset', 'Tool Presetter Operation', 'Tool Crib Management', 'Fitter',
            'General Fitting', 'Assembly Fitting', 'Precision Fitting', 'Pipe Fitting', 'Structural Fitting',
            'Mechanical Fitting', 'Hydraulic Fitting', 'Pneumatic Fitting', 'Marking', 'Chipping', 'Filing',
            'Scraping', 'Fitting of Bearings', 'Fitting of Seals', 'Fitting of Gaskets', 'Fasteners Assembly',
            'Nut Bolt Assembly', 'Riveting', 'Brazing', 'Soldering', 'Adhesive Bonding', 'Alignment',
            'Shaft Alignment', 'Laser Alignment', 'Dial Gauge Alignment', 'Feeler Gauge Alignment',
            'Machine Operator', 'Production Operator', 'Lathe Machine Operator', 'Milling Machine Operator',
            'Grinding Machine Operator', 'Drilling Machine Operator', 'Boring Machine Operator',
            'Shaper Machine Operator', 'Planer Machine Operator', 'Slotting Machine Operator',
            'Honing Machine Operator', 'Lapping Machine Operator', 'Superfinishing Operator',
            'Press Machine Operator', 'Power Press Operator', 'Hydraulic Press Operator', 'Pneumatic Press Operator',
            'Overhead Crane Operator', 'EOT Crane Operator', 'Hoist Operator', 'Conveyor Operator',
            'Packaging Machine Operator', 'Filling Machine Operator', 'Sealing Machine Operator',
            'Labeling Machine Operator', 'Arc Welding', 'MIG Welding', 'TIG Welding', 'Stick Welding',
            'Gas Welding', 'Spot Welding', 'Seam Welding', 'Laser Welding', 'Underwater Welding',
            'Pipe Welding', 'Structural Welding', 'Sheet Metal Welding', 'Assembly Line Worker',
            'Production Worker', 'Material Handling', 'Warehouse Operations', 'Inventory Management',
            'Stock Keeping', 'Order Picking', 'Packing', 'Loading Unloading', 'Palletizing', 'Storing',
            'Labeling', 'Barcoding', 'RF Scanner Operation', 'Fabrication', 'Cutting', 'Bending',
            'Shearing', 'Punching', 'Rolling', 'Die Casting', 'Sand Casting', 'Investment Casting',
            'Molding', 'Blow Molding', 'Extrusion', 'Annealing', 'Quenching', 'Tempering', 'Case Hardening',
            'Plating', 'Painting', 'Powder Coating', 'Electroplating', 'Anodizing', 'Polishing', 'Buffing',
            'Deburring', 'Machine Maintenance', 'Preventive Maintenance', 'Predictive Maintenance',
            'Corrective Maintenance', 'Breakdown Maintenance', 'Scheduled Maintenance', 'Lubrication',
            'Oil Change', 'Greasing', 'Coolant Management', 'Belt Replacement', 'Bearing Replacement',
            'Seal Replacement', 'Gasket Replacement', 'Motor Repair', 'Pump Repair', 'Compressor Repair',
            'Gearbox Repair', 'Industrial Safety', 'Workplace Safety', 'PPE Usage', 'Safety Glasses',
            'Safety Gloves', 'Safety Shoes', 'Helmet Usage', 'Ear Protection', 'Respirator Usage',
            'Lockout Tagout', 'Fire Safety', 'Fire Extinguisher', 'First Aid', 'Emergency Response',
            'Hazard Identification', 'Chemical Safety', 'Machine Guarding', 'Material Safety Data Sheet',
            '5S Safety', 'Blueprint Reading', 'Engineering Drawing Reading', 'Technical Drawing',
            'CAD Drawing Reading', 'Isometric Drawing', 'Orthographic Drawing', 'P&ID Reading',
            'Geometric Tolerancing', 'Dimensional Tolerances', 'Production Supervision', 'Shift Management',
            'Work Allocation', 'Manpower Planning', 'Shift Scheduling', 'Training Coordination',
            'Performance Monitoring', 'Target Achievement', 'Physical Stamina', 'Hand-Eye Coordination',
            'Manual Dexterity', 'Multitasking', 'Work Under Pressure',

            // Law
            'Criminal Law', 'Civil Law', 'Corporate Law', 'Commercial Law', 'Contract Law', 'Family Law',
            'Constitutional Law', 'Tax Law', 'Property Law', 'Labour Law', 'Employment Law',
            'Intellectual Property Law', 'Patent Law', 'Trademark Law', 'Copyright Law', 'Real Estate Law',
            'Banking Law', 'Insurance Law', 'Environmental Law', 'International Law', 'Immigration Law',
            'Bankruptcy Law', 'Insolvency Law', 'Cyber Law', 'Information Technology Law', 'Media Law',
            'Entertainment Law', 'Sports Law', 'Health Law', 'Pharmaceutical Law', 'Education Law',
            'Energy Law', 'Oil and Gas Law', 'Mining Law', 'Aviation Law', 'Maritime Law', 'Transportation Law',
            'Antitrust Law', 'Competition Law', 'Consumer Protection Law', 'Human Rights Law',
            'Administrative Law', 'Securities Law', 'Mergers and Acquisitions Law', 'Litigation',
            'Trial Advocacy', 'Courtroom Procedure', 'Pleading Drafting', 'Motion Practice', 'Discovery Process',
            'Deposition', 'Cross Examination', 'Direct Examination', 'Evidence Presentation', 'Witness Handling',
            'Expert Witness Examination', 'Opening Statements', 'Closing Arguments', 'Jury Selection',
            'Jury Instructions', 'Appellate Practice', 'Appeal Brief Writing', 'Oral Arguments',
            'Pre-trial Preparation', 'Post-trial Motions', 'Settlement Negotiation', 'Mediation',
            'Arbitration', 'Alternative Dispute Resolution', 'Legal Drafting', 'Agreement Drafting',
            'Legal Notice Drafting', 'Affidavit Drafting', 'Will Drafting', 'Trust Drafting', 'Power of Attorney',
            'Lease Agreement Drafting', 'Partnership Deed Drafting', 'Memorandum of Understanding',
            'Non-Disclosure Agreement', 'Employment Contract', 'Service Agreement', 'Sale Deed Drafting',
            'Gift Deed Drafting', 'Mortgage Deed Drafting', 'Legal Opinion Writing', 'Legal Memorandum',
            'Case Brief Writing', 'Legal Research Writing', 'Petition Drafting', 'Application Drafting',
            'Reply Drafting', 'Rejoinder Drafting', 'Case Law Research', 'Statutory Research',
            'Regulatory Research', 'Precedent Analysis', 'Legal Citation', 'Bluebook Citation',
            'Legal Database Search', 'Westlaw', 'LexisNexis', 'Manupatra', 'SCC Online', 'Indian Kanoon',
            'Legal Periodicals Research', 'Law Journal Research', 'Comparative Legal Research',
            'International Law Research', 'Corporate Governance', 'Company Incorporation',
            'Board Meeting Management', 'Shareholder Agreement', 'Legal Compliance', 'Regulatory Compliance',
            'Annual Returns Filing', 'Board Resolution Drafting', 'Minutes Drafting', 'Joint Venture Agreement',
            'Share Purchase Agreement', 'Asset Purchase Agreement', 'Business Transfer Agreement',
            'Franchise Agreement', 'Licensing Agreement', 'Technology Transfer Agreement', 'Income Tax Law',
            'GST Law', 'Corporate Tax Law', 'International Tax Law', 'Tax Litigation', 'Tax Avoidance',
            'Tax Evasion', 'Tax Treaty Analysis', 'Tax Assessment', 'Tax Appeal', 'Patent Filing',
            'Patent Prosecution', 'Patent Litigation', 'Trademark Registration', 'Trademark Prosecution',
            'Trademark Litigation', 'Copyright Registration', 'Copyright Infringement', 'Design Registration',
            'Geographical Indication', 'Trade Secret Protection', 'IP Due Diligence', 'IP Licensing',
            'IP Valuation', 'Labor Law Compliance', 'Industrial Disputes', 'Employee Termination',
            'Wrongful Termination', 'Sexual Harassment Law', 'Workplace Harassment', 'Discrimination Law',
            'Wage and Hour Law', 'Employee Benefits Law', 'Workers Compensation', 'Trade Union Law',
            'Collective Bargaining', 'HR Policy Drafting', 'Employee Handbook', 'Property Due Diligence',
            'Title Search', 'Title Verification', 'Sale Deed Registration', 'Land Acquisition',
            'Rental Agreement', 'Property Dispute Resolution', 'Succession Certificate', 'Probate',
            'Will Execution', 'Real Estate Litigation', 'Bail Application', 'Anticipatory Bail',
            'Criminal Complaint Filing', 'FIR Drafting', 'Criminal Appeal', 'Criminal Revision',
            'Criminal Defense', 'White Collar Crime', 'Cyber Crime', 'Economic Offense', 'NDPS Act',
            'POCSO Act', 'Negotiable Instruments Act', 'Divorce Law', 'Mutual Consent Divorce',
            'Contested Divorce', 'Child Custody', 'Maintenance Law', 'Alimony', 'Adoption Law',
            'Guardianship', 'Domestic Violence Law', 'Marriage Registration', 'Pre-nuptial Agreement',
            'Post-nuptial Agreement', 'Family Settlement Agreement', 'Guardianship and Wards Act',
            'Constitutional Interpretation', 'Fundamental Rights', 'Writ Petition', 'Habeas Corpus',
            'Mandamus', 'Certiorari', 'Prohibition', 'Quo Warranto', 'Public Interest Litigation',
            'Administrative Tribunals', 'Judicial Review', 'Client Counseling', 'Client Management',
            'Legal Advice', 'Legal Opinion', 'Persuasion', 'Analytical Skills', 'Logical Reasoning',
            'Case Management', 'File Management', 'Document Management', 'Legal Ethics',
            'Professional Responsibility', 'Legal Writing', 'Oral Communication', 'Argumentation',
            'Case Management Software', 'Legal Billing', 'Time Tracking', 'Client Billing',
            'Legal Calendar Management', 'Court Filing', 'E-filing', 'Legal Correspondence', 'Notary Public',
            'Oath Administration', 'LLB', 'LLM', 'PhD in Law', 'Bar Council Enrollment', 'Corporate Secretary',
            'Company Secretary', 'Certified Legal Manager', 'Certified Compliance Professional',
            'Certified Patent Agent', 'Certified Trademark Agent', 'Mediation Certification',
            'Arbitration Certification',

            // Construction Labour
            'Construction Labour', 'Building Construction', 'Road Construction', 'Bridge Construction',
            'Dam Construction', 'Tunnel Construction', 'Site Clearing', 'Earthwork', 'Landfilling',
            'POP Work', 'Gypsum Work', 'Tile Laying', 'Floor Tiling', 'Wall Tiling', 'Marble Work',
            'Granite Work', 'Terrazzo Work', 'White Wash', 'Distemper Work', 'Polish Work', 'Varnish Work',
            'Carpentry', 'Wood Cutting', 'Wood Carving', 'Furniture Making', 'Cabinet Making',
            'Door Frame Making', 'Window Frame Making', 'Furniture Fitting', 'Wood Polishing',
            'Wood Sanding', 'Wood Joinery', 'Veneer Work', 'Laminate Fixing', 'False Ceiling Installation',
            'Gypsum Ceiling', 'PVC Ceiling', 'Electrical Labour', 'Casing Wiring', 'Surface Wiring',
            'Electrical Fitting', 'Switch Installation', 'Socket Installation', 'Light Fitting', 'Fan Installation',
            'Tube Light Fitting', 'LED Light Installation', 'MCB Installation', 'Distribution Board Wiring',
            'Earthing Work', 'Cable Laying', 'Wire Pulling', 'Plumbing', 'PVC Pipe Fitting', 'GI Pipe Fitting',
            'CPVC Pipe Fitting', 'Pipe Threading', 'Pipe Joining', 'Faucet Installation', 'Tap Fitting',
            'Valve Fitting', 'Wash Basin Installation', 'Sink Installation', 'Geyser Installation',
            'Water Tank Installation', 'Drainage Work', 'Sewage Pipe Laying', 'Septic Tank Construction',
            'Leak Repair', 'Pipe Leakage Fixing', 'Welding Labour', 'Fabrication Work', 'Metal Cutting',
            'Metal Bending', 'Metal Grinding', 'Steel Fabrication', 'Iron Fabrication', 'Aluminium Fabrication',
            'Grill Fabrication', 'Gate Fabrication', 'Railing Fabrication', 'Agricultural Labour', 'Farming',
            'Cultivation', 'Ploughing', 'Tilling', 'Sowing', 'Planting', 'Irrigation', 'Watering',
            'Fertilizer Application', 'Pesticide Spraying', 'Weeding', 'Harvesting', 'Crop Cutting',
            'Threshing', 'Winnowing', 'Paddy Transplanting', 'Vegetable Farming', 'Fruit Farming',
            'Floriculture', 'Nursery Work', 'Greenhouse Work', 'Organic Farming', 'Factory Labour',
            'Packing Worker', 'Quality Checker', 'Stacking', 'Sorting', 'Bottling', 'Canning', 'Food Processing',
            'Textile Labour', 'Weaving', 'Spinning', 'Dyeing', 'Sewing', 'Embroidery', 'Garment Stitching',
            'Leather Work', 'Plastic Moulding', 'Injection Moulding', 'Extrusion Work', 'Warehouse Worker',
            'Godown Worker', 'Inventory Worker', 'Stock Keeper', 'Order Picker', 'Packer', 'Logistics Worker',
            'Pallet Jack Operator', 'Hand Truck Operator', 'Loading Dock Worker', 'Container Loading',
            'Container Unloading', 'Barcode Scanning', 'Dispatch Worker', 'Receiving Worker', 'Driver',
            'Truck Driver', 'Lorry Driver', 'Tractor Driver', 'Loader Driver', 'JCB Operator',
            'Forklift Driver', 'Dumper Driver', 'Road Roller Operator', 'Concrete Mixer Driver', 'Delivery Boy',
            'Courier Worker', 'Cleaning Worker', 'Housekeeping', 'Sweeping', 'Mopping', 'Dusting',
            'Vacuum Cleaning', 'Floor Cleaning', 'Window Cleaning', 'Glass Cleaning', 'Toilet Cleaning',
            'Waste Disposal', 'Garbage Collection', 'Street Sweeping', 'Drain Cleaning', 'Sewer Cleaning',
            'Industrial Cleaning', 'Office Cleaning', 'Home Cleaning', 'General Helper', 'Mason Helper',
            'Carpenter Helper', 'Electrician Helper', 'Plumber Helper', 'Painter Helper', 'Welder Helper',
            'Mechanic Helper', 'Technician Helper', 'Material Carrier', 'Tool Keeper', 'Site Helper',
            'Workshop Helper', 'Mining Labour', 'Quarry Worker', 'Stone Cutting', 'Stone Crushing',
            'Sand Mining', 'Coal Mining', 'Rock Breaking', 'Blasting Work', 'Waiter', 'Server',
            'Kitchen Helper', 'Dishwasher', 'Cook Helper', 'Hotel Housekeeping', 'Room Attendant',
            'Laundry Worker', 'Bell Boy', 'Security Guard', 'Watchman', 'Gatekeeper', 'Maintenance Worker',
            'Building Maintenance', 'Equipment Maintenance', 'AC Maintenance', 'Fridge Repair',
            'Washing Machine Repair', 'TV Repair', 'Mobile Repair', 'Computer Repair', 'Laptop Repair',
            'Bike Repair', 'Car Repair', 'Handyman', 'General Labour', 'Daily Wage Worker', 'Contract Labour',
            'Casual Labour', 'Temporary Worker', 'Odd Job Worker', 'Furniture Moving', 'Loading Unloading Work',
            'Packing Moving', 'Gardener', 'Landscaping', 'Lawn Mowing', 'Plantation', 'Tree Cutting',
            'Branch Cutting', 'Hedge Trimming', 'Weed Removal', 'Fertilizer Spreading', 'Soil Preparation',
            'Safety Compliance', 'Mask Usage', 'Harness Usage', 'Team Work', 'Punctuality', 'Discipline',
            'Hard Working', 'Following Instructions', 'Coordination', 'Flexibility', 'Reliability',

            // Medical
            'Patient Assessment', 'Medical History Taking', 'Physical Examination', 'Differential Diagnosis',
            'Emergency Triage', 'Intubation', 'Central Line Placement', 'Lumbar Puncture', 'Chest Tube Insertion',
            'Suturing & Wound Care', 'Endotracheal Intubation', 'Defibrillation', 'Venipuncture',
            'Cardiology (ECG Interpretation)', 'Radiology (X-Ray/CT/MRI)', 'Ultrasound (POCUS)',
            'Neonatal Resuscitation', 'Trauma Life Support (ATLS)', 'Basic Life Support (BLS)',
            'Advanced Cardiac Life Support (ACLS)', 'Pharmacotherapy Management', 'IV Fluid Management',
            'Pain Management', 'Antibiotic Stewardship', 'Medical Documentation', 'Breaking Bad News',
            'Informed Consent Process', 'Multidisciplinary Teamwork', 'Infection Control',
        ];

        // Remove duplicates automatically
        $skills = array_unique($skills);
        
        // Remove any empty values
        $skills = array_filter($skills, function($skill) {
            return !empty($skill) && is_string($skill);
        });

        // Convert to associative array with 'name' as key
        $skillsData = [];
        foreach ($skills as $skill) {
            $skillsData[] = ['name' => trim($skill)];
        }

        // Re-index array after filtering
        $skillsData = array_values($skillsData);

        // Insert in chunks to avoid memory issues
        $chunks = array_chunk($skillsData, 500);
        foreach ($chunks as $chunk) {
            DB::table('skills')->insert($chunk);
        }

        $this->command->info('Seeded ' . count($skillsData) . ' unique skills successfully!');
    }
}