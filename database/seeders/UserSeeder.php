<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\RebateAllocation;
use App\Models\SymbolGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin 1
        $super1 = User::create([
            'first_name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role' => "super-admin",
            'referral_code' => 'MOSx666666',
        ]);
        $super1->assignRole('super-admin');

        // Super Admin 2
        $super2 = User::create([
            'first_name' => 'it',
            'email' => 'it@ct',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role' => "super-admin",
            'referral_code' => 'BqZbHiSqZc',
        ]);
        $super2->assignRole('super-admin');

        // Agent user
        $agent = User::create([
            'first_name' => 'Sandbox Admin',
            'email' => 'sandbox@sandbox.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role' => "agent",
            'referral_code' => 'MOSx555666',
            'id_number' => 'AID00003',
        ]);
        $agent->assignRole('agent');

        // Rebate allocations for agent
        $symbolGroups = SymbolGroup::all();

        foreach ($symbolGroups as $group) {
            RebateAllocation::create([
                'user_id' => $agent->id,
                'account_type_id' => 1,
                'symbol_group_id' => $group->id,
                'amount' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
