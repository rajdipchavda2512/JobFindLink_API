<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Truncate the table first (optional - be careful in production)
        Schema::disableForeignKeyConstraints();
        DB::table('languages')->truncate();
        Schema::enableForeignKeyConstraints();
        
        $languages = [
            // Scheduled Languages of India (Official)
            ['name' => 'Hindi'],
            ['name' => 'English'],
            ['name' => 'Bengali'],
            ['name' => 'Telugu'],
            ['name' => 'Marathi'],
            ['name' => 'Tamil'],
            ['name' => 'Urdu'],
            ['name' => 'Gujarati'],
            ['name' => 'Malayalam'],
            ['name' => 'Kannada'],
            ['name' => 'Odia'],
            ['name' => 'Punjabi'],
            ['name' => 'Assamese'],
            ['name' => 'Maithili'],
            ['name' => 'Santali'],
            ['name' => 'Kashmiri'],
            ['name' => 'Nepali'],
            ['name' => 'Sindhi'],
            ['name' => 'Dogri'],
            ['name' => 'Konkani'],
            ['name' => 'Manipuri'],
            ['name' => 'Bodo'],
            ['name' => 'Sanskrit'],
            
            // Other Major Indian Languages
            ['name' => 'Rajasthani'],
            ['name' => 'Bhojpuri'],
            ['name' => 'Magahi'],
            ['name' => 'Chhattisgarhi'],
            ['name' => 'Haryanvi'],
            ['name' => 'Garhwali'],
            ['name' => 'Kumaoni'],
            ['name' => 'Tulu'],
            ['name' => 'Kodava'],
            ['name' => 'Saurashtra'],
            ['name' => 'Mizo'],
            ['name' => 'Khasi'],
            ['name' => 'Garo'],
            ['name' => 'Lepcha'],
            ['name' => 'Bhutia'],
            ['name' => 'Ladakhi'],
            ['name' => 'Pahari'],
            ['name' => 'Awadhi'],
            ['name' => 'Braj Bhasha'],
            ['name' => 'Bundeli'],
            ['name' => 'Bagheli'],
            ['name' => 'Malvi'],
            ['name' => 'Nimadi'],
            ['name' => 'Surgujia'],
            ['name' => 'Kokborok'],
            ['name' => 'Dimasa'],
            ['name' => 'Karbi'],
            ['name' => 'Lotha'],
            ['name' => 'Angami'],
            ['name' => 'Ao'],
            ['name' => 'Sema'],
            ['name' => 'Konyak'],
            ['name' => 'Phom'],
            ['name' => 'Chang'],
            ['name' => 'Sangtam'],
            ['name' => 'Yimkhiung'],
            ['name' => 'Zeliang'],
            ['name' => 'Rongmei'],
            ['name' => 'Liangmai'],
            ['name' => 'Mao'],
            ['name' => 'Maram'],
            ['name' => 'Thadou'],
            ['name' => 'Paite'],
            ['name' => 'Vaiphei'],
            ['name' => 'Zou'],
            ['name' => 'Hmar'],
            ['name' => 'Mara'],
            ['name' => 'Tedim Chin'],
            ['name' => 'Hakha Chin'],
            ['name' => 'Falam Chin'],
            
            // International Languages (Common in India)
            ['name' => 'Arabic'],
            ['name' => 'French'],
            ['name' => 'German'],
            ['name' => 'Spanish'],
            ['name' => 'Japanese'],
            ['name' => 'Chinese'],
            ['name' => 'Russian'],
            ['name' => 'Portuguese'],
            ['name' => 'Italian'],
            ['name' => 'Korean'],
        ];
        
        foreach ($languages as $language) {
            Language::create($language);
        }
        
        $this->command->info('Languages seeded successfully! Total: ' . count($languages));
    }
}