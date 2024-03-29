<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Order;
use App\Models\Other\RoleType;
use App\Models\Record;
use App\Models\User;
use Carbon\Carbon;
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

        $sportsman = User::factory()->create();
        $sportsman->assign(RoleType::SPORTSMAN);

        $trainer_1 = User::factory()->create();
        $trainer_1->assign(RoleType::TRAINER);

        $sportsman_1 = User::factory()->create();
        $sportsman_1->assign(RoleType::SPORTSMAN);

        $trainer_2 = User::factory()->create();
        $trainer_2->assign(RoleType::TRAINER);

        $sportsman_2 = User::factory()->create();
        $sportsman_2->assign(RoleType::SPORTSMAN);

        $trainer_3 = User::factory()->create();
        $trainer_3->assign(RoleType::TRAINER);

        $trainer_4 = User::factory()->create();
        $trainer_4->assign(RoleType::TRAINER);

        $trainer_5 = User::factory()->create();
        $trainer_5->assign(RoleType::TRAINER);

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

        $cat_4 = Category::factory()->state([
            'name' => 'POLE DANCE',
            'description' => 'Połączenie tańca, gimnastyki i akrobatyki. Niezwykle popularna forma treningu tanecznego, w którym wszystkie figury wykonuje się przy i na pionowym drążku. Zajęcia dla osób początkujących koncentrują się przede wszystkim na wzmocnieniu mięśni niezbędnych do utrzymania się na rurze (brzucha, ramion, grzbietu), rozciągnięciu i uelastycznieniu całego ciała oraz nauce prostych chwytów, figur i obrotów. Ćwiczone elementy są następnie łączone w proste choreografie, które z czasem stają się coraz bardziej efektowne, zróżnicowane i wymagające technicznie.',
            'url_link' => 'https://r4.wallpaperflare.com/wallpaper/661/291/616/girl-hair-brunette-shoes-wallpaper-6271b2009d764e2bda38e275a0b83962.jpg',
        ])->create();

        $cat_5 = Category::factory()->state([
            'name' => 'AKTYWNY SENIOR',
            'description' => 'Specjalistyczne zajęcia dedykowane seniorom. Ten unikalny zestaw ćwiczeń pozwoli rozpocząć przygodę z aktywnością fizyczną, która z kolei poprawi komfort życia i wpłynie pozytywnie na samopoczucie. Z pewnością aktywność fizyczna w tej formie będzie miała także funkcje rehabilitacyjne. Seniorzy popracują nad poprawą krążenia, ruchomością stawów, a także poprawią swój stan psychiczny i samopoczucie. Aktywność w grupie, oprócz wpływu na zdrowie pozwoli także na eliminowanie poczucia izolacji.',
            'url_link' => 'https://cdn-prod.medicalnewstoday.com/content/images/articles/325/325004/senior-man-doing-squats.jpg',
        ])->create();

        $cat_6 = Category::factory()->state([
            'name' => 'JOGA',
            'description' => 'Zajęcia te biją rekordy popularności i zdobywają uznanie coraz większej liczby osób. Opierają się głównie na technikach relaksacyjnych i oddechowych, dzięki temu wpływają pozytywnie nie tylko na ciało, ale także na ogólne samopoczucie i nastrój. Wyciszające ćwiczenia w rytm spokojnej muzyki pozwolą Ci ukoić myśli i zdobyć energię na nowe wyzwania dnia codziennego. Często podczas treningu wykorzystuje się akcesoria treningowe takie jak: paski czy klocki.',
            'url_link' => 'https://c1.wallpaperflare.com/preview/29/446/501/kettlebell-fitness-crossfit-fit.jpg',
        ])->create();

        $cat_7 = Category::factory()->state([
            'name' => 'FULL BODY WORKOUT',
            'description' => 'Kompleksowy trening, który wpłynie pozytywnie na całe ciało. Podczas tego treningu ogólnorozwojowego będziesz pracować nad najważniejszymi partiami mięśniowymi. Po pierwsze są to intensywne ćwiczenia cardio, a po drugie najlepsze ćwiczenia wzmacniające całe ciało. W trakcie zajęć często wykorzystywane są dodatkowe akcesoria treningowe: hantle, gumy, sztangi, czy piłki. Te zajęcia zdobyły uznanie wśród klientów, ponieważ dbają o całe ciało i pomagają uzyskać idealną sylwetkę.',
            'url_link' => 'https://r4.wallpaperflare.com/wallpaper/37/985/194/workout-gym-bodybuilder-wallpaper-68683bb4258d728691ea7d6c73a784d0.jpg',
        ])->create();

        $cat_8 = Category::factory()->state([
            'name' => 'MMA',
            'description' => 'MMA, czyli mieszane sztuki walki, to dyscyplina sportowa, w której zawodnicy walczą za pomocą technik zaczerpniętych z wielu różnych sztuk walki. MMA jest wielkim widowiskiem sportowym, a prezentowane walki na scenie robią duże wrażenie na odbiorcach. Wszystko dzięki dużej swobodzie doboru technik i chwytów. W MMA używa się taktyk sportowych z boksu, zapasów, judo, kick-boxingu czy ju-jitsu.',
            'url_link' => 'https://r4.wallpaperflare.com/wallpaper/327/906/477/sports-mixed-martial-arts-conor-mcgregor-mma-wallpaper-98c89daef5d7138487df4910e879c1b0.jpg',
        ])->create();

        $order_1 = Order::factory()->state([
            'category_id' => $cat_1->id,
            'user_id' => $trainer->id,
            'date' => Carbon::now()->addDays(3)->format('Y-m-d'),
            'from_time' => '11:00',
            'to_time' => '12:00',
            'name' => 'Kickboxing',
            'description' => 'Mam na imię Mikołaj, ze sportami walki związany jestem od 10 lat, posiadam purpurowy pas w brazylisjkim ju jitsu a także jestem medalistą mistrzostw Europy oraz polski w bjj. Posiadam certyfikat z uprawnieniami instruktora.Zapraszam na treningi indywidualne z zakresu : samoobronysportów uderzanych (muay thai, kickboxing, mma) sportów chwytanych bjj budowania formy fizycznej z wykorzystaniem masy własnego ciała możliwość pomocy w treningu siłowym posiadam doświadczenie w przygotowaniu fizycznym pod udział w biegach typu runmagedon, survival race-możliwość pomocy w doborze suplementacji oraz metod zdrowego odżywiania Swoją ofertę kieruje zarówno do osób dorosłych jak i dzieci.'
        ])->create();

        $order_2 = Order::factory()->state([
            'category_id' => $cat_2->id,
            'user_id' => $trainer_1->id,
            'date' => Carbon::now()->addDays(6)->format('Y-m-d'),
            'from_time' => '12:00',
            'to_time' => '13:00',
            'name' => 'Boks',
            'description' => 'Mam na imię Mikołaj, ze sportami walki związany jestem od 10 lat, posiadam purpurowy pas w brazylisjkim ju jitsu a także jestem medalistą mistrzostw Europy oraz polski w bjj. Posiadam certyfikat z uprawnieniami instruktora.Zapraszam na treningi indywidualne z zakresu : samoobrony sportów uderzanych (muay thai, kickboxing, mma) sportów chwytanych bjj budowania formy fizycznej z wykorzystaniem masy własnego ciała możliwość pomocy w treningu siłowym posiadam doświadczenie w przygotowaniu fizycznym pod udział w biegach typu runmagedon, survival race możliwość pomocy w doborze suplementacji oraz metod zdrowego odżywiania Swoją ofertę kieruje zarówno do osób dorosłych jak i dzieci.'
        ])->create();

        $order_3 = Order::factory()->state([
            'category_id' => $cat_2->id,
            'user_id' => $trainer_1->id,
            'date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            'from_time' => '15:00',
            'to_time' => '16:30',
            'name' => 'Sporty walki',
            'description' => 'DESC'
        ])->create();

        $order_4 = Order::factory()->state([
            'category_id' => $cat_2->id,
            'user_id' => $trainer_1->id,
            'date' => Carbon::now()->subDays(2)->format('Y-m-d'),
            'from_time' => '17:00',
            'to_time' => '18:00',
            'name' => 'Name 1',
            'description' => 'DESC'
        ])->create();

        $order_5 = Order::factory()->state([
            'category_id' => $cat_5->id,
            'user_id' => $trainer_1->id,
            'date' => Carbon::now()->subDays(2)->format('Y-m-d'),
            'from_time' => '9:00',
            'to_time' => '11:00',
            'name' => 'Joga',
            'description' => 'Cześć! Mam na imię Ewa i od ponad dwóch lat uczę jogi na różnych poziomach zaawansowania, udzielam lekcji indywidualnych lub w małych grupach na terenie Warszawy oraz online. Jogę praktykuję już 10 lat, a styl jakiego uczę to Vinyasa yoga czyli połączenie ruchu z oddechem.'
        ])->create();

        $order_6 = Order::factory()->state([
            'category_id' => $cat_5->id,
            'user_id' => $trainer_1->id,
            'date' => Carbon::now()->subDays(1)->format('Y-m-d'),
            'from_time' => '11:00',
            'to_time' => '11:45',
            'name' => 'Pilates',
            'description' => 'Ćwiczenia Pilates przyczyniają się do: poprawy siły mięśniowej lepszego funkcjonowania kręgosłupa i poprawy postawy ciała, postury zwiększenia elastyczności redukucji stresu ogólnej poprawy zdrowia Ćwiczenia te mają ogromny wpływ na biomechaniczną pracę dna miednicy. Dlatego Pilates oraz niektóre ćwiczenia Jogi są uważane za jedną z najlepszych metod dla osób z PROBLEMAMI Z KRĘGOSŁUPEM. Co więcej, jest to bardzo BEZPIECZNA forma aktywności fizycznej.'
        ])->create();

        $order_7 = Order::factory()->state([
            'category_id' => $cat_6->id,
            'user_id' => $trainer_1->id,
            'date' => Carbon::now()->format('Y-m-d'),
            'from_time' => '14:00',
            'to_time' => '16:00',
            'name' => 'Trening siłowy',
            'description' => 'Desc'
        ])->create();

        $record_1 = Record::factory()->state([
            'order_id' => $order_1->id,
            'user_id' => $sportsman->id
        ])->create();

        $record_2 = Record::factory()->state([
            'order_id' => $order_2->id,
            'user_id' => $sportsman_1->id
        ])->create();

        $record_3 = Record::factory()->state([
            'order_id' => $order_3->id,
            'user_id' => $sportsman->id
        ])->create();

        $record_2 = Record::factory()->state([
            'order_id' => $order_5->id,
            'user_id' => $sportsman_2->id
        ])->create();

        $record_2 = Record::factory()->state([
            'order_id' => $order_4->id,
            'user_id' => $sportsman_2->id
        ])->create();

        $record_2 = Record::factory()->state([
            'order_id' => $order_6->id,
            'user_id' => $sportsman->id
        ])->create();
    }
}
