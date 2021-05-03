<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appleList = [
            [
                'name' => 'iPhone 12 Pro Max', 'price' => 1099,
                'item_model' => 'A2342 (United States), A2410 (Canada, Japan), A2412 (China mainland, Hong Kong, Macao), A2411 (other countries and regions)',
                'image_url' => 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-12-pro-max-blue-hero?wid=940&hei=1112&fmt=png-alpha&qlt=80&.v=1604021658000',
                'description' => "iPhone 12 Pro Max has a 6.7-inch1 all-screen Super Retina XDR display. The back is textured matte glass, and there's a flat-edge stainless steel band around the frame. The side button is on the right side of the device. There are three 12 MP cameras on the back: Ultra Wide, Wide, and Telephoto. There's a LiDAR Scanner on the back. There's a Dual-LED True Tone flash on the back and a SIM tray on the left side that holds a 'ourth form factor' (4FF) nano-SIM card. The IMEI is etched on the SIM tray."
            ],
            [
                'name' => 'iPhone 12 Pro', 'price' => 999,
                'item_model' => 'A2341 (United States), A2406 (Canada, Japan), A2408 (China mainland, Hong Kong, Macao), A2407 (other countries and regions)',
                'image_url' => 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-12-pro-blue-hero?wid=940&hei=1112&fmt=png-alpha&qlt=80&.v=1604021661000',
                'description' => "Phone 12 Pro has a 6.1-inch1 all-screen Super Retina XDR display. The back is textured matte glass, and there's a flat-edge stainless steel band around the frame. The side button is on the right side of the device. There are three 12 MP cameras on the back: Ultra Wide, Wide, and Telephoto. There's a LiDAR Scanner on the back. There's a Dual-LED True Tone flash on the back and a SIM tray on the left side that holds a 'fourth form factor' (4FF) nano-SIM card. The IMEI is etched on the SIM tray."
            ],
            [
                'name' => 'iPhone 12', 'price' => 799,
                'item_model' => 'A2172 (United States), A2402 (Canada, Japan), A2404 (China Mainland, Hong Kong, Macao), A2403 (other countries and regions)',
                'image_url' => 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-12-select-2021?wid=940&hei=1112&fmt=jpeg&qlt=80&.v=1617130318000',
                'description' => "iPhone 12 has a 6.1-inch1 all-screen Super Retina XDR display. The back is glass, and there's a flat-edged anodized aluminum band around the frame. The side button is on the right side of the device. There are two 12 MP cameras on the back: Ultra Wide and Wide. There's a Dual-LED True Tone flash on the back and a SIM tray on the left side that holds a 'fourth form factor' (4FF) nano-SIM card. The IMEI is etched on the SIM tray."
            ],
            [
                'name' => 'MacBook Pro 16 inch', 'price' => 2399,
                'item_model' => 'A2342 (United States), A2410 (Canada, Japan), A2412 (China mainland, Hong Kong, Macao), A2411 (other countries and regions)',
                'image_url' => 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/mbp16touch-space-select-201911?wid=904&hei=840&fmt=jpeg&qlt=80&.v=1572825197207',
                'description' => "iPhone 12 Pro Max has a 6.7-inch1 all-screen Super Retina XDR display. The back is textured matte glass, and there's a flat-edge stainless steel band around the frame. The side button is on the right side of the device. There are three 12 MP cameras on the back: Ultra Wide, Wide, and Telephoto. There's a LiDAR Scanner on the back. There's a Dual-LED True Tone flash on the back and a SIM tray on the left side that holds a 'ourth form factor' (4FF) nano-SIM card. The IMEI is etched on the SIM tray."
            ]
        ];

        $appleCategoryId = Category::where('name', 'Apple')->first()->id;

        foreach ($appleList as $list) {
            Item::create([
                'name' => $list['name'], 'item_model' => $list['item_model'], 'description' => $list['description'],
                'category_id' => $appleCategoryId, 'price' => $list['price'], 'image_url' => $list['image_url'],
                'is_available' => 1
            ]);
        }

        $otherBrand = [
            [
                'name' => 'Redmi Note 9 Pro', 'price' => 482, 'category_name' => 'Xiaomi',
                'item_model' => 'M2003J6B2G',
                'image_url' => 'https://www.gizmochina.com/wp-content/uploads/2020/03/Xiaomi-Redmi-Note-9-Pro-500x500.jpg',
                'description' => "The Redmi Note 9 Pro (Global Version) runs on Android 10 and all this is powered by a 5020 mAh battery. It measures 165.8 x 76.7 x 8.8 mm (height x width x thickness) with a total weight of 209 grams including battery."
            ],
            [
                'name' => 'Google Pixel 4', 'price' => 384, 'category_name' => 'Google',
                'item_model' => 'G020M, G020I, GA01188-US, GA01187-US, GA01189-US, GA01191-US, GA01189-US',
                'image_url' => 'https://www.gizmochina.com/wp-content/uploads/2019/09/google-pixel-500x500.jpg',
                'description' => "Google Pixel 4 is based on Android 10 and packs 64GB of inbuilt storage. The Google Pixel 4 is a dual-SIM (GSM and GSM) smartphone that accepts Nano-SIM and eSIM cards. The Google Pixel 4 measures 147.10 x 68.80 x 8.20mm (height x width x thickness) and weighs 162.00 grams. It was launched in Clearly White, Just Black, and Oh So Orange colours. It bears a glass body."
            ],
        ];

        foreach ($otherBrand as $brand) {
            $categoryId = Category::where('name', $brand['category_name'])->first()->id;
            Item::create([
                'name' => $brand['name'], 'item_model' => $brand['item_model'], 'description' => $brand['description'],
                'category_id' => $categoryId, 'price' => $list['price'], 'image_url' => $brand['image_url'],
                'is_available' => 1
            ]);
        }

    }
}
