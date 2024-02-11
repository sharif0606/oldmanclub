<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Backend\DesignCard;

class DesignCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DesignCard::insert(
            [
                [
                    'design_name' => 'Classic',
                    'svg' => '<svg viewBox="0 0 72 72" focusable="false" class="chakra-icon chakra-icon css-1uz6nvy"><g clip-path="url(#clip0_1931_53838)"><path d="M0 -24H72V54H0V-24Z" fill="currentColor"></path><path d="M72 72.5V39.18C44.16 29.9533 29.568 63.3176 0 41.7337V72.5H72Z" fill="white"></path></g><defs><clipPath id="clip0_1931_53838"><rect fill="white" height="72" rx="16" width="72"></rect></clipPath></defs></svg>',
                    'template_id'=>1,
                    'created_by'=>1,
                ],
                [
                    'design_name' => 'Modern',
                    'svg' => '<svg viewBox="0 0 72 72" focusable="false" class="chakra-icon chakra-icon css-1uz6nvy"><g clip-path="url(#clip0_805_62524)"><rect fill="white" height="72" rx="16" width="72"></rect><g clip-path="url(#clip1_805_62524)"><path d="M0 -16.875H72V30.3333L0 55.637V-16.875Z" fill="url(#paint0_linear_805_62524)"></path><circle cx="53" cy="27.125" fill="#EDF2F7" r="14"></circle></g></g><defs><linearGradient gradientUnits="userSpaceOnUse" id="paint0_linear_805_62524" x1="36" x2="36" y1="-16.875" y2="55.637"><stop offset="0" stop-color="currentColor"></stop><stop offset="0.75" stop-color="currentColor" stop-opacity="0.75"></stop></linearGradient><clipPath id="clip0_805_62524"><rect fill="white" height="72" rx="16" width="72"></rect></clipPath><clipPath id="clip1_805_62524"><rect fill="white" height="72.576" transform="translate(0 -16.875)" width="72"></rect></clipPath></defs></svg>',
                    'template_id'=>2,
                    'created_by'=>1,
                ],
                [
                    'design_name' => 'Flat',
                    'svg' => '<svg viewBox="0 0 72 72" focusable="false" class="chakra-icon chakra-icon css-1uz6nvy"><g clip-path="url(#a)"><rect fill="#F5F5F5" height="72" rx="16" width="72"></rect><circle cx="36" cy="-6.75" fill="currentColor" r="59.625"></circle><path d="M15.75 42.75h41.625v13.5H15.75z" fill="#fff"></path></g><defs><clipPath id="a"><rect fill="#fff" height="72" rx="16" width="72"></rect></clipPath></defs></svg>',
                    'template_id'=>3,
                    'created_by'=>1,
                ],
                [
                    'design_name' => 'Sleek',
                    'svg' => '<svg viewBox="0 0 72 72" focusable="false" class="chakra-icon chakra-icon css-1uz6nvy"><g clip-path="url(#a)"><rect fill="#fff" height="72" rx="16" width="72"></rect><g clip-path="url(#b)" fill="currentColor"><path d="M0-29.25h72v72.512H0z"></path><path d="M0 32.184v4.88c13.344 7.171 24 7.605 40.224-.83 16.224-8.436 24-7.34 31.776-5.4V29.57c-17.856-5.99-32.352 5.845-43.584 8.798C17.184 41.319 9.888 39.21 0 32.184Z"></path></g></g><defs><clipPath id="a"><rect fill="#fff" height="72" rx="16" width="72"></rect></clipPath><clipPath id="b"><path d="M0-29.25h72v72.576H0z" fill="#fff"></path></clipPath></defs></svg>',
                    'template_id'=>4,
                    'created_by'=>1,
                ]
            ]
        );
    }
}
