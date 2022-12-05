<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Order;
use App\Models\Other\RoleType;
use App\Models\Record;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create();
        $admin->assign(RoleType::ADMIN);

        $trainer = User::factory()->create();
        $trainer->assign(RoleType::TRAINER);

        $trainer_1 = User::factory()->create();
        $trainer_1->assign(RoleType::TRAINER);

        $trainer_2 = User::factory()->create();
        $trainer_2->assign(RoleType::TRAINER);

        $sportsman = User::factory()->create();
        $sportsman->assign(RoleType::SPORTSMAN);

        $sportsman_1 = User::factory()->create();
        $sportsman_1->assign(RoleType::SPORTSMAN);

        $sportsman_2 = User::factory()->create();
        $sportsman_2->assign(RoleType::SPORTSMAN);

        $cat_1 = Category::factory()->state([
            'name' => 'BOKS',
            'description' => 'Zajęcia boksu to świetny trening dla każdego, kto chce pracować nad wzmocnieniem ciała, ale i psychiki. Zdecydowanie jest to bardzo intensywny i wymagający trening. Dzięki tym ćwiczeniom szybko pozbędziesz się zbędnej tkanki tłuszczowej i uzyskasz silne i wyrzeźbione mięśnie. Na treningu nauczysz się techniki, a także poznasz określone sekwencje ruchów. Świadoma praca z własnym ciałem i umysłem przyniesie Ci wiele satysfakcji i zwiększy pewność siebie.',
            'url_link' => 'https://r4.wallpaperflare.com/wallpaper/779/261/266/boxer-kriti-sanon-model-boxing-wallpaper-6fc06c9fb998ef9514b9f0dec551b42e.jpg',
        ])->create();

        $cat_2 = Category::factory()->state([
            'name' => 'KICKBOXING',
            'description' => 'Trening idealny dla miłośników sportów walki. Specjalistyczny zestaw ćwiczeń polega na wykorzystaniu technik znanych w KickBoxingu. Będziesz miał okazję poznać podstawy tego sportu, dowiesz się, jak poprawnie wykonywać ciosy i kopnięcia. Podczas zajęć dużą uwagę przywiązuje się do pracy nad koncentracją, co przyczynia się do większej precyzji podczas wykonywanych ruchów. Rozwiniesz siłę, wydolność i szybkość. Taki trening może być też świetnym sposobem na rozładowanie napięcia.',
            'url_link' => 'https://r4.wallpaperflare.com/wallpaper/877/170/388/gloves-kickboxer-sportsman-wallpaper-b2ce819811d52ea6b1b6b4ff9928d98b.jpg',
        ])->create();

        $cat_3 = Category::factory()->state([
            'name' => 'TRENING OBWODOWY',
            'description' => 'Trening Obwodowy to świetne zajęcie, które zdecydowanie wpłyną pozytywnie na Twoje zdrowie. Ich głównym celem jest redukcja nadprogramowych kilogramów, ale jednocześnie zwiększenie siły i budowanie mięśni. To najlepszy sposób na uzyskanie szybkich efektów i osiągnięcie celu, jakim jest zgrabna, smukła, ale umięśniona sylwetka. W ćwiczenia podczas treningu zaangażowane jest całe ciało.',
            'url_link' => 'https://r4.wallpaperflare.com/wallpaper/155/896/46/girl-gym-running-treadmill-smiling-sport-earphones-wallpaper-a2c16280bdf64e1bea085285a0a8a992.jpg',
        ])->create();

        $order_1 = Order::factory()->state([
            'category_id' => $cat_1->id,
            'user_id' => $trainer->id,
            'date' => '2022-12-12',
            'from_time' => '11:00',
            'to_time' => '12:00',
            'name' => 'Name 1',
            'description' => 'DESCXXXCXC'
        ])->create();

        $order_2 = Order::factory()->state([
            'category_id' => $cat_2->id,
            'user_id' => $trainer_1->id,
            'date' => '2022-12-12',
            'from_time' => '12:00',
            'to_time' => '13:00',
            'name' => 'Name 1',
            'description' => 'DESCXXXCXC'
        ])->create();

        $order_3 = Order::factory()->state([
            'category_id' => $cat_2->id,
            'user_id' => $trainer_1->id,
            'date' => '2022-12-12',
            'from_time' => '13:00',
            'to_time' => '11:00',
            'name' => 'Name 1',
            'description' => 'DESCXXXCXC'
        ])->create();

        $record_1 = Record::factory()->state([
            'order_id' => $order_1->id,
            'user_id' => $sportsman->id
        ])->create();

        $record_2 = Record::factory()->state([
            'order_id' => $order_2->id,
            'user_id' => $sportsman_1->id
        ])->create();
    }
}
