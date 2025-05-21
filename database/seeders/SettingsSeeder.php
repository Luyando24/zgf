<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if settings already exist
        if (Setting::count() === 0) {
            Setting::create([
                'site_name' => 'Zambian Governance Foundation',
                'site_description' => 'Empowering communities across Zambia',
                'meta_title' => 'ZGF - Zambian Governance Foundation',
                'meta_description' => 'Zambian Governance Foundation - Empowering communities across Zambia',
                'meta_keywords' => 'ZGF, Zambian Governance Foundation, Zambia, NGO',
                'contact_email' => 'info@zgf.org.zm',
            ]);
            
            $this->command->info('Default settings created.');
        } else {
            $this->command->info('Settings already exist, skipping...');
        }
    }
}
