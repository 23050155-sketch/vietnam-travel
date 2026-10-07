<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Place;
use App\Models\Province;
use Illuminate\Support\Str;

class PlaceSeeder extends Seeder
{
    public function run(): void
    {
        $places = [

            // =========================
            // TÂY NINH
            // =========================
            [
                'province' => 'Tây Ninh',
                'name' => 'Núi Bà Đen',
                'short_description' => 'Điểm du lịch nổi tiếng với cảnh quan núi non và hệ thống cáp treo.',
                'description' => 'Núi Bà Đen là một trong những địa điểm du lịch nổi bật của Tây Ninh, thu hút du khách bởi cảnh quan thiên nhiên và các công trình tâm linh.',
                'address' => 'Phường Ninh Sơn, Tây Ninh',
                'status' => 'active',
            ],
            [
                'province' => 'Tây Ninh',
                'name' => 'Tòa Thánh Tây Ninh',
                'short_description' => 'Công trình tôn giáo nổi bật của đạo Cao Đài.',
                'description' => 'Tòa Thánh Tây Ninh nổi bật với kiến trúc đặc sắc, màu sắc rực rỡ và giá trị văn hóa, tôn giáo đặc trưng.',
                'address' => 'Thị xã Hòa Thành, Tây Ninh',
                'status' => 'active',
            ],
            [
                'province' => 'Tây Ninh',
                'name' => 'Hồ Dầu Tiếng',
                'short_description' => 'Hồ nước lớn với phong cảnh thiên nhiên yên bình.',
                'description' => 'Hồ Dầu Tiếng là điểm đến phù hợp cho các hoạt động tham quan, cắm trại và ngắm cảnh.',
                'address' => 'Tây Ninh',
                'status' => 'active',
            ],
            [
                'province' => 'Tây Ninh',
                'name' => 'Ma Thiên Lãnh',
                'short_description' => 'Thung lũng có cảnh quan hoang sơ, phù hợp khám phá thiên nhiên.',
                'description' => 'Ma Thiên Lãnh nằm giữa các ngọn núi, có cảnh quan xanh mát và không gian yên tĩnh.',
                'address' => 'Tây Ninh',
                'status' => 'active',
            ],
            [
                'province' => 'Tây Ninh',
                'name' => 'Vườn Quốc gia Lò Gò - Xa Mát',
                'short_description' => 'Khu bảo tồn thiên nhiên với hệ sinh thái đa dạng.',
                'description' => 'Vườn Quốc gia Lò Gò - Xa Mát là điểm đến thích hợp cho du lịch sinh thái và khám phá thiên nhiên.',
                'address' => 'Huyện Tân Biên, Tây Ninh',
                'status' => 'hidden',
            ],

            // =========================
            // HÀ NỘI
            // =========================
            [
                'province' => 'Hà Nội',
                'name' => 'Hồ Hoàn Kiếm',
                'short_description' => 'Biểu tượng nổi tiếng nằm ở trung tâm thủ đô Hà Nội.',
                'description' => 'Hồ Hoàn Kiếm là địa điểm tham quan nổi tiếng, gắn với nhiều giá trị lịch sử và văn hóa của Hà Nội.',
                'address' => 'Quận Hoàn Kiếm, Hà Nội',
                'status' => 'active',
            ],
            [
                'province' => 'Hà Nội',
                'name' => 'Lăng Chủ tịch Hồ Chí Minh',
                'short_description' => 'Công trình lịch sử quan trọng tại Quảng trường Ba Đình.',
                'description' => 'Lăng Chủ tịch Hồ Chí Minh là nơi gìn giữ thi hài Chủ tịch Hồ Chí Minh và là một trong những địa điểm lịch sử quan trọng của Việt Nam.',
                'address' => 'Ba Đình, Hà Nội',
                'status' => 'active',
            ],
            [
                'province' => 'Hà Nội',
                'name' => 'Văn Miếu - Quốc Tử Giám',
                'short_description' => 'Di tích lịch sử và biểu tượng truyền thống hiếu học.',
                'description' => 'Văn Miếu - Quốc Tử Giám là quần thể di tích gắn với nền giáo dục và văn hóa lâu đời của Việt Nam.',
                'address' => 'Đống Đa, Hà Nội',
                'status' => 'active',
            ],
            [
                'province' => 'Hà Nội',
                'name' => 'Phố cổ Hà Nội',
                'short_description' => 'Khu phố mang nét văn hóa và kiến trúc đặc trưng của Hà Nội.',
                'description' => 'Phố cổ Hà Nội gồm nhiều tuyến phố lâu đời, nổi bật với ẩm thực, mua sắm và kiến trúc truyền thống.',
                'address' => 'Hoàn Kiếm, Hà Nội',
                'status' => 'active',
            ],
            [
                'province' => 'Hà Nội',
                'name' => 'Chùa Một Cột',
                'short_description' => 'Công trình kiến trúc Phật giáo nổi tiếng của Hà Nội.',
                'description' => 'Chùa Một Cột là một trong những biểu tượng kiến trúc và văn hóa đặc sắc của thủ đô Hà Nội.',
                'address' => 'Ba Đình, Hà Nội',
                'status' => 'hidden',
            ],

            // =========================
            // TP. HỒ CHÍ MINH
            // =========================
            [
                'province' => 'TP. Hồ Chí Minh',
                'name' => 'Địa đạo Củ Chi',
                'short_description' => 'Di tích lịch sử nổi tiếng với hệ thống địa đạo dưới lòng đất.',
                'description' => 'Địa đạo Củ Chi là di tích lịch sử quan trọng, giúp du khách tìm hiểu về cuộc sống và chiến đấu trong thời kỳ chiến tranh.',
                'address' => 'Củ Chi, TP. Hồ Chí Minh',
                'status' => 'active',
            ],
            [
                'province' => 'TP. Hồ Chí Minh',
                'name' => 'Dinh Độc Lập',
                'short_description' => 'Công trình lịch sử nổi bật ở trung tâm thành phố.',
                'description' => 'Dinh Độc Lập gắn với nhiều sự kiện lịch sử quan trọng và hiện là điểm tham quan nổi tiếng.',
                'address' => 'Quận 1, TP. Hồ Chí Minh',
                'status' => 'active',
            ],
            [
                'province' => 'TP. Hồ Chí Minh',
                'name' => 'Chợ Bến Thành',
                'short_description' => 'Khu chợ nổi tiếng, biểu tượng quen thuộc của thành phố.',
                'description' => 'Chợ Bến Thành là địa điểm mua sắm và khám phá ẩm thực, văn hóa đặc trưng của TP. Hồ Chí Minh.',
                'address' => 'Quận 1, TP. Hồ Chí Minh',
                'status' => 'active',
            ],
            [
                'province' => 'TP. Hồ Chí Minh',
                'name' => 'Bưu điện Trung tâm Sài Gòn',
                'short_description' => 'Công trình kiến trúc cổ nổi bật tại trung tâm thành phố.',
                'description' => 'Bưu điện Trung tâm Sài Gòn thu hút du khách nhờ kiến trúc cổ điển và vị trí gần nhiều điểm tham quan nổi tiếng.',
                'address' => 'Quận 1, TP. Hồ Chí Minh',
                'status' => 'active',
            ],
            [
                'province' => 'TP. Hồ Chí Minh',
                'name' => 'Phố đi bộ Nguyễn Huệ',
                'short_description' => 'Không gian đi bộ và vui chơi sôi động ở trung tâm thành phố.',
                'description' => 'Phố đi bộ Nguyễn Huệ là nơi thường xuyên diễn ra các hoạt động vui chơi, sự kiện và giải trí.',
                'address' => 'Quận 1, TP. Hồ Chí Minh',
                'status' => 'hidden',
            ],
        ];

        foreach ($places as $item) {

            $province = Province::where(
                'name',
                $item['province']
            )->first();

            if (!$province) {
                continue;
            }

            Place::updateOrCreate(
                [
                    'province_id' => $province->id,
                    'name' => $item['name'],
                ],
                [
                    'slug' => Str::slug($item['name']),
                    'short_description' => $item['short_description'],
                    'description' => $item['description'],
                    'address' => $item['address'],
                    'status' => $item['status'],
                ]
            );
        }
    }
}

