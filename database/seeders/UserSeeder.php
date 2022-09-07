<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*  User::create([
            'username' => 'admin',
            'full_name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => 'admin',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => 'J6QYU1',
            'total_direct' => 2,
            'total_group' => 4,
            'role' => 'admin',
        ]);

        User::create([
            'username' => '1',
            'full_name' => '1',
            'email' => '1@1.com',
            'phone' => '1',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => '123456',
            'total_direct' => 1,
            'total_group' => 1,
            'referral' => 1,
            'hierarchyList' => '-1-',
        ]);

        User::create([
            'username' => '2',
            'full_name' => '2',
            'email' => '2@2.com',
            'phone' => '2',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => '234567',
            'total_direct' => 0,
            'total_group' => 0,
            'referral' => 2,
            'hierarchyList' => '-1-2-',
        ]);


        User::create([
            'username' => '3',
            'full_name' => '3',
            'email' => '3@3.com',
            'phone' => '3',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => '345678',
            'total_direct' => 1,
            'total_group' => 1,
            'referral' => 1,
            'hierarchyList' => '-1-',
        ]);


        User::create([
            'username' => '4',
            'full_name' => '4',
            'email' => '4@4.com',
            'phone' => '4',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => '456789',
            'total_direct' => 0,
            'total_group' => 0,
            'referral' => 4,
            'hierarchyList' => '-1-4-',
        ]); */

        /*  DB::statement("INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `email_verified_at`, `phone`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `security_pin`, `country`, `province`, `referral`, `hierarchyList`, `invite_code`, `ranking`, `usdt_wallet`, `roi_wallet`, `personal_sales`, `direct_sales`, `group_sales`, `total_direct`, `total_group`, `usdt_address`, `usdt_withdrawal_address`, `is_auto_withdrawal`, `status`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`, `id_no`, `front_img`, `back_img`, `passport_img`, `hold_img`, `utils_img`, `kyc_status`, `kyc_reason`, `id_type`) VALUES
        (1,	'admin',	'admin',	'admin@admin.com',	NULL,	'admin',	'\$2y\$10\$WupVjdJMWb.RCCqlLeg/8uGB5xucmolKN.Tnj8foZgd1BCS.BwRei',	NULL,	NULL,	NULL,	'\$2y\$10\$gFhYJMHrK0sdBumZR1yXUetXduxd9r24PW/6psNQ6fI2mamY26UKq',	'1',	'2',	NULL,	NULL,	'J6QYU1',	1,	0,	0,	0,	0,	0,	2,	16,	NULL,	NULL,	1,	1,	'admin',	NULL,	NULL,	NULL,	'2022-09-06 00:14:19',	'2022-09-06 00:33:48',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (2,	'1',	'1',	'1@1.com',	NULL,	'1',	'\$2y\$10\$bAGntgMHRK7wjivHKKyzoeM/uoZThdfzcAdIAvOPNSgvuHNu31c3u',	NULL,	NULL,	NULL,	'\$2y\$10\$GTRzIs7GoLqvCZaqcZu2l.XZdv8seq/mTxXtXPMRBLzvM6XftzcAa',	'1',	'2',	'1',	'-1-',	'123456',	1,	0,	0,	0,	0,	0,	2,	13,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:14:19',	'2022-09-06 00:33:48',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (3,	'2',	'2',	'2@2.com',	NULL,	'2',	'\$2y\$10\$2bJCpe7qkptYeklOM5B50ewb.nAcasQrOyyxz5tPEOSwYXGwgo6MO',	NULL,	NULL,	NULL,	'\$2y\$10\$Cm.A6L3Ko57rYPMloX.EUu.9pxK6T1/BJsCdbHMisXU2f3MPSJlT.',	'1',	'2',	'2',	'-1-2-',	'234567',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:14:19',	'2022-09-06 00:14:19',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (4,	'3',	'3',	'3@3.com',	NULL,	'3',	'\$2y\$10\$Yh/hnd0/TZQ1wLAnMGNPDOwkB5I2xcXzzUP3BasZyFbeQ2JliU.7K',	NULL,	NULL,	NULL,	'\$2y\$10\$HRIRYBDx6AQkF4Mz3Viv3uu9fjQeca6h/HSfnGPfwuI3WkesEgpSe',	'1',	'2',	'1',	'-1-',	'345678',	1,	0,	10000,	0,	0,	0,	1,	1,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:14:19',	'2022-09-06 00:14:19',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (5,	'4',	'4',	'4@4.com',	NULL,	'4',	'\$2y\$10\$8lSzBpoKVWN1DdWC3Mo1NuhAfWzOrcC.2iO8MggOgHm7zvfn.ysa.',	NULL,	NULL,	NULL,	'\$2y\$10\$jKum0e0y8QxWjcAwV5RDluerVF/ya.1O1Fp3D.jPB3J/X3dYPr/82',	'1',	'2',	'4',	'-1-4-',	'456789',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:14:20',	'2022-09-06 00:14:20',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (6,	'abs1',	'abs1',	'abs1@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$puVI7xfdTwa7ufVjpeFiEuZMuVeRDtfV2boWUhP.qMxbxD5LW6C9G',	NULL,	NULL,	NULL,	'\$2y\$10\$eADxOtdIffpV2jtPNThSzOp.GGarweE4noTJ5eCQg.MJ7fiB0RVhG',	'1',	'1',	'2',	'-1-2-',	'FDAUCS',	1,	10000,	0,	0,	0,	0,	11,	11,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:30:15',	'2022-09-06 00:38:02',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (7,	'abs2',	'abs2',	'abs2@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$5xpKm.vOUsE69SmPkhVQcO8hOnrWlhGs1m5tvT3nVBuadTqdSs8/O',	NULL,	NULL,	NULL,	'\$2y\$10\$PYGvJb9KF2LIxu2Q3X3NFusq/1g1lY7KQkfx9CognRYaHVrMMnPne',	'1',	'1',	'6',	'-1-2-6-',	'SJAKIZ',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:30:59',	'2022-09-06 00:30:59',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (8,	'abs3',	'abs3',	'abs3@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$lotO740Rvzkj7caMys8jUOPRwnpR806p.BIE/w5inKZGkOTI6MMza',	NULL,	NULL,	NULL,	'\$2y\$10\$RXTQ61Q3BSdjVBhqtH1kFuCcU9tXBy74v4mEd1ytRzN.W/tPD3ji6',	'1',	'1',	'6',	'-1-2-6-',	'TJC5CW',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:32:26',	'2022-09-06 00:32:26',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (9,	'abs4',	'abs4',	'abs4@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$TbWt0PLhQy3FhhVD.UUeDub8C3NEKb6K0RQc1SzMS9Uj1UIw9vt9i',	NULL,	NULL,	NULL,	'\$2y\$10\$8xbCszi8Vfektd7bhHBaWu8eA9kFzVbYqrXMJa6pYZJg4K1DqetXy',	'1',	'1',	'6',	'-1-2-6-',	'43EZGR',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:32:35',	'2022-09-06 00:32:35',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (10,	'abs5',	'abs5',	'abs5@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$jtlZNTmHPAQDCXFKfMJUvOkorHwGj1GA3dfAqCXUZc.82gccfpSfO',	NULL,	NULL,	NULL,	'\$2y\$10\$l4NCwLWiNomJfAzbeRCAdezi.mYT04si5Bk2iufV1qZNaSe7EACWG',	'1',	'1',	'6',	'-1-2-6-',	'ENEUCQ',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:32:48',	'2022-09-06 00:32:48',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (11,	'abs6',	'abs6',	'abs6@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$rM95/FKzdKg01XjD50IdnOGjP2/VR5h4mmVyjwldzlKMp.bFgDNlK',	NULL,	NULL,	NULL,	'\$2y\$10\$5lpRdnW4s7OWPDN.oLAmUOzcAnYLVmEXLleAfZzxW7983edEU9jbW',	'1',	'1',	'6',	'-1-2-6-',	'WBHQEO',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:32:56',	'2022-09-06 00:32:56',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (12,	'abs7',	'abs7',	'abs7@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$oKBAFhuYiHC8F1czaVlTaOlWVmkWS3R18LcItp8QVEKuyDy60YV82',	NULL,	NULL,	NULL,	'\$2y\$10\$2Zum0pNo22O/oChVdsL74.edyQ2czNZ4n2h/PKoDE9Rd5N9b70y/y',	'1',	'1',	'6',	'-1-2-6-',	'LJU7K9',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:33:06',	'2022-09-06 00:33:06',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (13,	'abs8',	'abs8',	'abs8@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$ibMNNhv8jmi8oA33MLll3eqYxrH74/gNQhIv4uAPN2LStleZkKjwG',	NULL,	NULL,	NULL,	'\$2y\$10\$/iqjZh6M64Ptuh9Vp2OSvuTp91CU7.f6raZSHbijT/DreYvp64ueS',	'1',	'1',	'6',	'-1-2-6-',	'6IAYTX',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:33:14',	'2022-09-06 00:33:14',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (14,	'abs9',	'abs9',	'abs9@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$9uchZgYvsaYB61Y/dSjv4u3MYQM3Fe0FjRActYdQo7/jzoxMCj.v6',	NULL,	NULL,	NULL,	'\$2y\$10\$EfmnACFmbd3VdjtV5IzoFOBMYpUDkCA/jKySzDs6SXcqW5xz/PV7u',	'1',	'1',	'6',	'-1-2-6-',	'TA9EUT',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:33:22',	'2022-09-06 00:33:22',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (15,	'abs10',	'abs10',	'abs10@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$UpRSHS6Jv5LsR/5JMkHSyOHA4MpX8oeuU04TpZKPiDBHS0AAesDIq',	NULL,	NULL,	NULL,	'\$2y\$10\$4sEvSKhBVUqWf1feStAvZuDNzOE56hTMD.6HJimmNHTGVQtBtSS.C',	'1',	'1',	'6',	'-1-2-6-',	'AXTKS1',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:33:31',	'2022-09-06 00:33:31',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (16,	'abs11',	'abs11',	'abs11@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$hDjppbLzMYpoepFytpr7AeyXTZC3bgbkmeVJKTwRnUija.ihuPvNy',	NULL,	NULL,	NULL,	'\$2y\$10\$F5rc7pcW/YPC3GVlJEX1yOv5I0p4cFedxt7Ag9umoLSm9TjTBKRhu',	'1',	'1',	'6',	'-1-2-6-',	'KCIJPH',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:33:40',	'2022-09-06 00:33:40',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL),
        (17,	'abs12',	'abs12',	'abs12@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$IyAukfzz4.AO/xQtw0Oha.Wyx3AhAoT1x4WD95RuyhX8L1YIP8AfW',	NULL,	NULL,	NULL,	'\$2y\$10\$tY4rcDjM96yVOBQFT0GoOOplMSYcpnheQRur5.YBOoBliFfEecbDm',	'1',	'1',	'6',	'-1-2-6-',	'IBUYJY',	1,	10000,	0,	0,	0,	0,	0,	0,	NULL,	NULL,	1,	1,	'user',	NULL,	NULL,	NULL,	'2022-09-06 00:33:48',	'2022-09-06 00:33:48',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'Approved',	NULL,	NULL);"); */
        DB::statement("INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `email_verified_at`, `phone`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `security_pin`, `country`, `province`, `referral`, `hierarchyList`, `invite_code`, `ranking`, `usdt_wallet`, `roi_wallet`, `personal_sales`, `direct_sales`, `group_sales`, `total_direct`, `total_group`, `usdt_address`, `usdt_withdrawal_address`, `is_auto_withdrawal`, `status`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`, `id_no`, `front_img`, `back_img`, `passport_img`, `hold_img`, `utils_img`, `kyc_status`, `kyc_reason`, `id_type`) VALUES
(1,	'admin',	'admin',	'admin@admin.com',	NULL,	'admin',	'\$2y\$10\$WupVjdJMWb.RCCqlLeg/8uGB5xucmolKN.Tnj8foZgd1BCS.BwRei',	'',	'',	NULL,	'\$2y\$10\$gFhYJMHrK0sdBumZR1yXUetXduxd9r24PW/6psNQ6fI2mamY26UKq',	'1',	'2',	'',	'',	'J6QYU1',	1,	0,	0,	0,	0,	1000,	2,	16,	'',	'',	1,	1,	'admin',	'',	NULL,	'',	'2022-09-05 16:14:19',	'2022-09-06 01:33:54',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(2,	'1',	'1',	'1@1.com',	NULL,	'1',	'\$2y\$10\$bAGntgMHRK7wjivHKKyzoeM/uoZThdfzcAdIAvOPNSgvuHNu31c3u',	'',	'',	NULL,	'\$2y\$10\$GTRzIs7GoLqvCZaqcZu2l.XZdv8seq/mTxXtXPMRBLzvM6XftzcAa',	'1',	'2',	'1',	'-1-',	'123456',	1,	0,	0,	0,	1000,	1000,	2,	13,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:14:19',	'2022-09-06 01:33:54',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(3,	'2',	'2',	'2@2.com',	NULL,	'2',	'\$2y\$10\$2bJCpe7qkptYeklOM5B50ewb.nAcasQrOyyxz5tPEOSwYXGwgo6MO',	'',	'',	NULL,	'\$2y\$10\$Cm.A6L3Ko57rYPMloX.EUu.9pxK6T1/BJsCdbHMisXU2f3MPSJlT.',	'1',	'2',	'2',	'-1-2-',	'234567',	1,	10000,	0,	0,	0,	0,	0,	0,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:14:19',	'2022-09-05 16:14:19',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(4,	'3',	'3',	'3@3.com',	NULL,	'3',	'\$2y\$10\$Yh/hnd0/TZQ1wLAnMGNPDOwkB5I2xcXzzUP3BasZyFbeQ2JliU.7K',	'',	'',	NULL,	'\$2y\$10\$HRIRYBDx6AQkF4Mz3Viv3uu9fjQeca6h/HSfnGPfwuI3WkesEgpSe',	'1',	'2',	'1',	'-1-',	'345678',	1,	0,	10000,	0,	0,	0,	1,	1,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:14:19',	'2022-09-05 16:14:19',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(5,	'4',	'4',	'4@4.com',	NULL,	'4',	'\$2y\$10\$8lSzBpoKVWN1DdWC3Mo1NuhAfWzOrcC.2iO8MggOgHm7zvfn.ysa.',	'',	'',	NULL,	'\$2y\$10\$jKum0e0y8QxWjcAwV5RDluerVF/ya.1O1Fp3D.jPB3J/X3dYPr/82',	'1',	'2',	'4',	'-1-4-',	'456789',	1,	10000,	0,	0,	0,	0,	0,	0,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:14:20',	'2022-09-05 16:14:20',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(6,	'abs1',	'abs1',	'abs1@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$puVI7xfdTwa7ufVjpeFiEuZMuVeRDtfV2boWUhP.qMxbxD5LW6C9G',	'',	'',	NULL,	'\$2y\$10\$eADxOtdIffpV2jtPNThSzOp.GGarweE4noTJ5eCQg.MJ7fiB0RVhG',	'1',	'1',	'2',	'-1-2-',	'FDAUCS',	1,	10000,	0,	0,	0,	0,	1,	11,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:30:15',	'2022-09-06 01:33:54',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(7,	'abs2',	'abs2',	'abs2@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$5xpKm.vOUsE69SmPkhVQcO8hOnrWlhGs1m5tvT3nVBuadTqdSs8/O',	'',	'',	NULL,	'\$2y\$10\$PYGvJb9KF2LIxu2Q3X3NFusq/1g1lY7KQkfx9CognRYaHVrMMnPne',	'1',	'1',	'6',	'-1-2-6-',	'SJAKIZ',	1,	10000,	0,	0,	0,	0,	1,	10,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:30:59',	'2022-09-05 16:30:59',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(8,	'abs3',	'abs3',	'abs3@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$lotO740Rvzkj7caMys8jUOPRwnpR806p.BIE/w5inKZGkOTI6MMza',	'',	'',	NULL,	'\$2y\$10\$RXTQ61Q3BSdjVBhqtH1kFuCcU9tXBy74v4mEd1ytRzN.W/tPD3ji6',	'1',	'1',	'7',	'-1-2-6-7-',	'TJC5CW',	1,	10000,	0,	0,	0,	0,	1,	9,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:32:26',	'2022-09-05 16:32:26',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(9,	'abs4',	'abs4',	'abs4@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$TbWt0PLhQy3FhhVD.UUeDub8C3NEKb6K0RQc1SzMS9Uj1UIw9vt9i',	'',	'',	NULL,	'\$2y\$10\$8xbCszi8Vfektd7bhHBaWu8eA9kFzVbYqrXMJa6pYZJg4K1DqetXy',	'1',	'1',	'8',	'-1-2-6-7-8-',	'43EZGR',	1,	10000,	0,	0,	0,	0,	1,	8,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:32:35',	'2022-09-05 16:32:35',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(10,	'abs5',	'abs5',	'abs5@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$jtlZNTmHPAQDCXFKfMJUvOkorHwGj1GA3dfAqCXUZc.82gccfpSfO',	'',	'',	NULL,	'\$2y\$10\$l4NCwLWiNomJfAzbeRCAdezi.mYT04si5Bk2iufV1qZNaSe7EACWG',	'1',	'1',	'9',	'-1-2-6-7-8-9-',	'ENEUCQ',	1,	10000,	0,	0,	0,	0,	1,	7,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:32:48',	'2022-09-05 16:32:48',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(11,	'abs6',	'abs6',	'abs6@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$rM95/FKzdKg01XjD50IdnOGjP2/VR5h4mmVyjwldzlKMp.bFgDNlK',	'',	'',	NULL,	'\$2y\$10\$5lpRdnW4s7OWPDN.oLAmUOzcAnYLVmEXLleAfZzxW7983edEU9jbW',	'1',	'1',	'10',	'-1-2-6-7-8-9-10-',	'WBHQEO',	1,	10000,	0,	0,	0,	0,	1,	6,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:32:56',	'2022-09-05 16:32:56',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(12,	'abs7',	'abs7',	'abs7@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$oKBAFhuYiHC8F1czaVlTaOlWVmkWS3R18LcItp8QVEKuyDy60YV82',	'',	'',	NULL,	'\$2y\$10\$2Zum0pNo22O/oChVdsL74.edyQ2czNZ4n2h/PKoDE9Rd5N9b70y/y',	'1',	'1',	'11',	'-1-2-6-7-8-9-10-11-',	'LJU7K9',	1,	10000,	0,	0,	0,	0,	1,	5,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:33:06',	'2022-09-05 16:33:06',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(13,	'abs8',	'abs8',	'abs8@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$ibMNNhv8jmi8oA33MLll3eqYxrH74/gNQhIv4uAPN2LStleZkKjwG',	'',	'',	NULL,	'\$2y\$10\$/iqjZh6M64Ptuh9Vp2OSvuTp91CU7.f6raZSHbijT/DreYvp64ueS',	'1',	'1',	'12',	'-1-2-6-7-8-9-10-11-12-',	'6IAYTX',	1,	10000,	0,	0,	0,	0,	1,	4,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:33:14',	'2022-09-05 16:33:14',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(14,	'abs9',	'abs9',	'abs9@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$9uchZgYvsaYB61Y/dSjv4u3MYQM3Fe0FjRActYdQo7/jzoxMCj.v6',	'',	'',	NULL,	'\$2y\$10\$EfmnACFmbd3VdjtV5IzoFOBMYpUDkCA/jKySzDs6SXcqW5xz/PV7u',	'1',	'1',	'13',	'-1-2-6-7-8-9-10-11-12-13-',	'TA9EUT',	1,	10000,	0,	0,	0,	0,	1,	3,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:33:22',	'2022-09-05 16:33:22',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(15,	'abs10',	'abs10',	'abs10@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$UpRSHS6Jv5LsR/5JMkHSyOHA4MpX8oeuU04TpZKPiDBHS0AAesDIq',	'',	'',	NULL,	'\$2y\$10\$4sEvSKhBVUqWf1feStAvZuDNzOE56hTMD.6HJimmNHTGVQtBtSS.C',	'1',	'1',	'14',	'-1-2-6-7-8-9-10-11-12-13-14-',	'AXTKS1',	1,	10000,	0,	0,	0,	0,	1,	2,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:33:31',	'2022-09-05 16:33:31',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(16,	'abs11',	'abs11',	'abs11@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$hDjppbLzMYpoepFytpr7AeyXTZC3bgbkmeVJKTwRnUija.ihuPvNy',	'',	'',	NULL,	'\$2y\$10\$F5rc7pcW/YPC3GVlJEX1yOv5I0p4cFedxt7Ag9umoLSm9TjTBKRhu',	'1',	'1',	'15',	'-1-2-6-7-8-9-10-11-12-13-14-15-',	'KCIJPH',	1,	10000,	0,	0,	0,	0,	1,	1,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:33:40',	'2022-09-05 16:33:40',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	''),
(17,	'abs12',	'abs12',	'abs12@gmail.com',	NULL,	'60162137879',	'\$2y\$10\$IyAukfzz4.AO/xQtw0Oha.Wyx3AhAoT1x4WD95RuyhX8L1YIP8AfW',	'',	'',	NULL,	'\$2y\$10\$tY4rcDjM96yVOBQFT0GoOOplMSYcpnheQRur5.YBOoBliFfEecbDm',	'1',	'1',	'16',	'-1-2-6-7-8-9-10-11-12-13-14-15-16-',	'IBUYJY',	1,	10000,	0,	0,	0,	0,	0,	0,	'',	'',	1,	1,	'user',	'',	NULL,	'',	'2022-09-05 16:33:48',	'2022-09-05 16:33:48',	NULL,	'',	'',	'',	'',	'',	'',	'Approved',	'',	'');");
    }
}
