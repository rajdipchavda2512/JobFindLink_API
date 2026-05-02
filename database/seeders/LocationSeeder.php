<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Truncate the table
        Schema::disableForeignKeyConstraints();
        DB::table('locations')->truncate();
        Schema::enableForeignKeyConstraints();
        
        $now = Carbon::now();
        
        $locations = [
            // ========== Ahmedabad District ==========
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Ahmedabad City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Navrangpura', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Satellite', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Prahlad Nagar', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Bodakdev', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Vastrapur', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'SG Highway', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Ashram Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'CG Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Maninagar', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Gita Mandir', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Kalupur', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Lal Darwaja', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Relief Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Gandhi Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Jamalpur', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Shahibaug', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Usmanpura', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Vijay Char Rasta', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Ambawadi', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Ellisbridge', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Paldi', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Vejalpur', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Jivraj Park', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Memnagar', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Gurukul', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Thaltej', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Science City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Gota', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Chandkheda', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Motera', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Sabarmati', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Ranip', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Naranpura', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Anand Nagar', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Vadaj', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Bapunagar', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Kankaria', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Danilimda', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Isanpur', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Vatva', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Odhav', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Nikol', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Naroda', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'CTM', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Amraiwadi', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Lambha', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Bopal', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Ghuma', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Shela', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'South Bopal', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Makarba', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Chharodi', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Sanand', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ahmedabad', 'area' => 'Changodar', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Surat District ==========
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Surat City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Athwalines', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Vesu', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'City Light', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Adajan', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Pal', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Piplod', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Dumas Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Magdalla', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Varachha', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Katargam', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Udhna', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Palanpur', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Rander', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Lal Darwaja', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Nanpura', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Sagrampura', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Ghod Dod Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Majura Gate', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Parvat Patiya', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Kadodara', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Bardoli', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Surat', 'area' => 'Navsari Bypass', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Vadodara District ==========
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Vadodara City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Alkapuri', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Race Course', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Gotri', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Vasna Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Fatehgunj', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Sayajigunj', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Karelibaug', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Akota', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Manjalpur', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Sama', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Subhanpura', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Waghodia Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Makarpura', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Chhani', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Nizampura', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vadodara', 'area' => 'Tandalja', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Rajkot District ==========
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'Rajkot City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'Kalavad Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'Gondal Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => '150 Feet Ring Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'University Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'Nana Mava', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'Mavdi', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'Aji Dam', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'Kalawad Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'Sadar Bazaar', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Rajkot', 'area' => 'Jail Road', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Bhavnagar District ==========
            ['state' => 'Gujarat', 'city' => 'Bhavnagar', 'area' => 'Bhavnagar City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Bhavnagar', 'area' => 'Waghawadi Road', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Bhavnagar', 'area' => 'Kalanala', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Bhavnagar', 'area' => 'Ghogha Circle', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Bhavnagar', 'area' => 'Chitra', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Jamnagar District ==========
            ['state' => 'Gujarat', 'city' => 'Jamnagar', 'area' => 'Jamnagar City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Jamnagar', 'area' => 'Indira Marg', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Jamnagar', 'area' => 'Park Colony', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Jamnagar', 'area' => 'Digvijay Plot', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Junagadh District ==========
            ['state' => 'Gujarat', 'city' => 'Junagadh', 'area' => 'Junagadh City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Junagadh', 'area' => 'Sardar Baug', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Junagadh', 'area' => 'Moti Baug', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Gandhinagar District ==========
            ['state' => 'Gujarat', 'city' => 'Gandhinagar', 'area' => 'Gandhinagar City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Gandhinagar', 'area' => 'Sector-1', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Gandhinagar', 'area' => 'Sector-7', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Gandhinagar', 'area' => 'Sector-11', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Gandhinagar', 'area' => 'Sector-16', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Gandhinagar', 'area' => 'Sector-21', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Gandhinagar', 'area' => 'Kudasan', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Gandhinagar', 'area' => 'Pethapur', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Anand District ==========
            ['state' => 'Gujarat', 'city' => 'Anand', 'area' => 'Anand City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Anand', 'area' => 'Vallabh Vidyanagar', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Anand', 'area' => 'Gamdi', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Anand', 'area' => 'Bakrol', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Nadiad District ==========
            ['state' => 'Gujarat', 'city' => 'Nadiad', 'area' => 'Nadiad City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Nadiad', 'area' => 'Santram Road', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Mehsana District ==========
            ['state' => 'Gujarat', 'city' => 'Mehsana', 'area' => 'Mehsana City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Mehsana', 'area' => 'Highway Road', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Himmatnagar District ==========
            ['state' => 'Gujarat', 'city' => 'Himmatnagar', 'area' => 'Himmatnagar City', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Morbi District ==========
            ['state' => 'Gujarat', 'city' => 'Morbi', 'area' => 'Morbi City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Morbi', 'area' => 'Race Course Road', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Gandhidham District ==========
            ['state' => 'Gujarat', 'city' => 'Gandhidham', 'area' => 'Gandhidham City', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Bhuj District ==========
            ['state' => 'Gujarat', 'city' => 'Bhuj', 'area' => 'Bhuj City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Bhuj', 'area' => 'Hospital Road', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Porbandar District ==========
            ['state' => 'Gujarat', 'city' => 'Porbandar', 'area' => 'Porbandar City', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Veraval District ==========
            ['state' => 'Gujarat', 'city' => 'Veraval', 'area' => 'Veraval City', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Vapi District ==========
            ['state' => 'Gujarat', 'city' => 'Vapi', 'area' => 'Vapi City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vapi', 'area' => 'GIDC', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Vapi', 'area' => 'Chala', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Valsad District ==========
            ['state' => 'Gujarat', 'city' => 'Valsad', 'area' => 'Valsad City', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Navsari District ==========
            ['state' => 'Gujarat', 'city' => 'Navsari', 'area' => 'Navsari City', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Bharuch District ==========
            ['state' => 'Gujarat', 'city' => 'Bharuch', 'area' => 'Bharuch City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Bharuch', 'area' => 'Zadeshwar', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Ankleshwar District ==========
            ['state' => 'Gujarat', 'city' => 'Ankleshwar', 'area' => 'Ankleshwar City', 'created_at' => $now, 'updated_at' => $now],
            ['state' => 'Gujarat', 'city' => 'Ankleshwar', 'area' => 'GIDC', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Godhra District ==========
            ['state' => 'Gujarat', 'city' => 'Godhra', 'area' => 'Godhra City', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Dahod District ==========
            ['state' => 'Gujarat', 'city' => 'Dahod', 'area' => 'Dahod City', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Surendranagar District ==========
            ['state' => 'Gujarat', 'city' => 'Surendranagar', 'area' => 'Surendranagar City', 'created_at' => $now, 'updated_at' => $now],
            
            // ========== Palanpur District ==========
            ['state' => 'Gujarat', 'city' => 'Palanpur', 'area' => 'Palanpur City', 'created_at' => $now, 'updated_at' => $now],
        ];
        
        // Insert in chunks for better performance
        $chunks = array_chunk($locations, 100);
        
        foreach ($chunks as $chunk) {
            DB::table('locations')->insert($chunk);
        }
        
        $this->command->info('Gujarat locations seeded successfully!');
        $this->command->info('Total cities: ' . count(array_unique(array_column($locations, 'city'))));
        $this->command->info('Total areas: ' . count($locations));
    }
}