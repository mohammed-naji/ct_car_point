<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    protected $permissions = [
        'add_type' => [
            'en' => 'Add new Type',
            'ar' => 'اضافة قسم جديد'
        ],
        'edit_type' => [
            'en' => ' Edit Type',
            'ar' => 'تعديل القسم'
        ],
        'show_types' => [
            'en' => 'Show Types',
            'ar' => 'مشاهدة الاقسام'
        ],
        'delete_type' => [
            'en' => 'Delete Type',
            'ar' => 'حذف قسم'
        ],
        'add_part' => [
            'en' => 'Add new Part',
            'ar' => 'اضافة قطعة جديدة'
        ],
        'edit_part' => [
            'en' => 'Edit Part',
            'ar' => 'تعديل قطعة'
        ],
        'show_parts' => [
            'en' => 'Show Parts',
            'ar' => 'مشاهدة القطع'
        ],
        'delete_part' => [
            'en' => 'Delete Part',
            'ar' => 'حذف القطعة'
        ],
        'add_blog' => [
            'en' => 'Add new Blog',
            'ar' => 'اضافة مقال جديد'
        ],
        'edit_blog' => [
            'en' => 'Edit Blog',
            'ar' => 'تعديل المقال'
        ],
        'show_blog' => [
            'en' => 'Show Blogs',
            'ar' => 'مشاهدة المقالات'
        ],
        'delete_blog' => [
            'en' => 'Delete Blog',
            'ar' => 'حذف المقال'
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissions as $code => $name) {
            Permission::create([
                'code' => $code,
                'name' => $name
            ]);
        }
    }
}
