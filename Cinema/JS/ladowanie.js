const dane = [
    {
        tytul: "Avatar",
        opis: "Akcja filmu rozgrywa się od maja do sierpnia 2154 roku. Główny bohater, Jake Sully (Sam Worthington), to sparaliżowany od pasa w dół weteran. Po śmierci swego brata bliźniaka, Toma, i ze względu na takie samo DNA, otrzymuje propozycję pracy w korporacji RDA w ramach programu Avatar, prowadzonego na księżycu gazowego giganta w układzie Alfa Centauri – Pandorze, zamieszkanym przez rasę humanoidalnych Na’vi. Z ich DNA skrzyżowanego z DNA ludzi hoduje się ciała zwane awatarami. Ludzki kontroler może zdalnie sterować i odczuwać takim ciałem. Na Pandorze Jake zostaje wrzucony w środek narastającego konfliktu między przybyszami z Ziemi a Na’vi, żyjącymi w pełnej harmonii z przyrodą.",
        tag: "avatar"
    },
    {
        tytul: "Avengers",
        opis: "Loki spotyka się z Innym, władcą pozaziemskiej rasy Chitauri. W zamian za Tesseract, Inny obiecuje Lokiemu armię, którą może podbić Ziemię. Nick Fury, dyrektor T.A.R.C.Z.Y., i agentka Maria Hill przybywają do ośrodka badawczego, w którym doktor Erik Selvig prowadził do tej pory badania nad Tesseractem. Agent Phil Coulson informuje ich, że obiekt promieniuje. Tesseract nagle się uaktywnia i otwiera portal przez który przechodzi Loki, który zabiera Tesseract i wykorzystując swoje berło zniewala Selviga oraz kilku agentów, w tym Clinta Bartona, aby pomogli mu się wydostać.",
        tag: "avengers"
    },   
    {
        tytul: "Hobbit",
        opis: "Hobbit przedstawia historię 60 lat przed głównymi wydarzeniami w ekranizacji Władcy Pierścieni. Niezwykła Podróż opowiada o hobbicie Bilbo Bagginsie, który wyrusza wraz z czarodziejem Gandalfem i trzynastoma krasnoludami w podróż do Samotnej Góry w celu pokonania smoka Smauga.",
        tag: "hobbit"
    },   
    {
        tytul: "Kung Fu Panda 2",
        opis: "Marzenia Po w końcu się spełniły – w najbardziej nieoczekiwany sposób przeszedł drogę od sprzedawcy makaronu do mistrza sztuk walki. Teraz może w pełni cieszyć się zasłużoną pozycją Smoczego Wojownika, chroniąc okolicę wraz ze swymi przyjaciółmi i mistrzami kung fu: Tygrysicą, Małpą, Modliszką, Żmiją i Żurawiem. Nowe, cudowne życie Po jest jednak zagrożone wraz z pojawieniem się wszechmocnego Lorda Shena, pawia, który knuje, żeby za sprawą sekretnej, niemożliwej do pokonania broni dokonać podboju Chin i na zawsze zniszczyć sztukę kung fu. W dodatku dla Smoczego Wojownika w pewnym momencie staje się jasne, że Pan Ping, właściciel restauracji, nie jest jego biologicznym ojcem.",
        tag: "kfp"
    }, 
    {
        tytul: "Batnman",
        opis: "Gotham City, miasto rodzinne Batmana, od dłuższego czasu boryka się z bezkarnymi kryminalistami. Przekupni politycy i policjanci pozostają w zmowie z gangsterami. Polegać można tylko na nielicznych. Porucznik James Gordon z nieocenioną pomocą Batmana wpada na trop banków, które biorą udział w praniu brudnych pieniędzy mafii. Policja zastawia pułapkę, ale gangsterom udaje się przewieźć pieniądze w bezpieczne miejsce – najprawdopodobniej ktoś ich ostrzegł o planowanej akcji. Podejrzenia padają na współpracowników nowo wybranego prokuratora okręgowego Harveya Denta. Batman postanawia zdobyć szczegółowe informacje na temat Denta. Ustala, że jest on nie tylko świetnym prawnikiem, ale i wyjątkowo uczciwym człowiekiem, czego najlepszym dowodem jest sympatia, jaką darzy go Rachel Dawes – przyjaciółka z dzieciństwa Bruce’a Wayne’a i jedna z niewielu osób znających jego podwójną tożsamość.",
        tag: "batman"
    },
    {
        tytul: "Pinokio",
        opis: "Pinokio jest drewnianym pajacem, który jednak może mówić i ruszać się. Odczuwa też głód, choroby i ludzkie słabości. Podobnie jak człowiek musi w życiu podejmować wybory. Jeśli są one złe, ponosi karę, a dobre są wynagradzane. Cechą charakterystyczną Pinokia jest nos, który wydłuża się, kiedy Pinokio kłamie. Pod koniec filmu Pinokio w nagrodę za dobre postępowanie staje się zwykłym chłopcem.",
        tag: "pinokio"
    },
    {
        tytul: "Venom",
        opis: "Venom is a 2018 American superhero film featuring the Marvel Comics character of the same name, produced by Columbia Pictures in association with Marvel[5] and Tencent Pictures. Distributed by Sony Pictures Releasing, it is the first film in the Sony Pictures Universe of Marvel Characters. Directed by Ruben Fleischer from a screenplay by Jeff Pinkner, Scott Rosenberg, and Kelly Marcel, it stars Tom Hardy as Eddie Brock / Venom, alongside Michelle Williams, Riz Ahmed, Scott Haze, and Reid Scott. In Venom, journalist Brock gains superpowers after becoming the host of an alien symbiote whose species plans to invade Earth.",
        tag: "venom"
    },
    {
        tytul: "Jeden Gniewny Człowiek",
        opis: "Kalifornijska firma, zajmująca się transportowaniem cennych ładunków, głównie milionów w gotówce, popada w coraz większe kłopoty. W ciągu ostatnich miesięcy kilka jej konwojów zostało napadniętych, ograbionych, a ochraniające je ekipy wymordowano. W takich okolicznościach do firmy dołącza H (Jason Statham), milczący twardziel o niejasnej przeszłości, ale o nieocenionych kompetencjach. Jego zadaniem jest podniesienie bezpieczeństwa konwojów i wykrycie sprawców napadów. Wkrótce okaże się jednak, że jego prawdziwym celem jest zemsta. H odkrywa, że za napady odpowiada gang, którego ludzie kilka miesięcy temu zabili jego syna. Wkrótce ulice LA spłyną krwią, bo dla H 'oko za oko' to za mało.",
        tag: "JGC"
    },
    {
        tytul: "Ciche Miejsce 2",
        opis: "Dalsze losy rodziny Abbottów (Emily Blunt, Milicent Simmonds, Noah Jupe), która po śmiertelnych wydarzeniach, jakie wydarzyły się w domu, teraz musi stawić czoła niebezpieczeństwom poza nim. Abbotowie wciąż próbują – w ciszy – przetrwać atak tajemniczych stworzeń, które atakują, reagując na dźwięk. Wkrótce Abbotowie odkryją, że nie są one jedynym śmiertelnym zagrożeniem…",
        tag: "CM2"
    },
    {
        tytul: "Cruella",
        opis: "„Cruella” powraca ze znakomitą Emmą Stone w roli głównej! Nowa produkcja Disneya przedstawia historię o buntowniczych początkach jednej z najbardziej znanych i genialnych filmowych postaci, legendarnej Cruelli de Mon. W filmie Cruella znajduje się kilka scen z dynamicznymi efektami świetlnymi, które mogą powodować dyskomfort u widzów wrażliwych na światło i wpływać na osoby z epilepsją fotogenną.",
        tag: "Cruella"
    },
    {
        tytul: "Mortal Combat",
        opis: "Zawodnik mieszanych sztuk walki Cole Young przywykł do tego, że obrywa za pieniądze. Nie ma jednak pojęcia o swoim pochodzeniu i nie wie, dlaczego władca Zaświatów Shang Tsung nasłał na niego swojego najlepszego wojownika, Sub-Zero, kriomancera z innego wymiaru. W obawie o bezpieczeństwo rodziny Cole udaje się na poszukiwanie Sonyi Blade, poleconą mu przez Jaxa. Ten major sił specjalnych ma takie samo dziwne znamię w kształcie smoka, z jakim urodził się Cole. Wkrótce Cole trafia do świątyni Lorda Raidena, jednego ze Starszych Bóstw i obrońcy Ziemi, zapewniającego schronienie tym, którzy mają smocze znamię. W świątyni Cole trenuje z doświadczonymi wojownikami Liu Kangiem i Kung Lao oraz zbuntowanym najemnikiem Kano. Wspólnie staną do walki największych mistrzów Ziemi z przeciwnikami z Zaświatów, w której stawką jest wszechświat. Ale czy Cole zdoła uwolnić swoje arcana – niezmierzoną moc we wnętrzu duszy – i zdąży nie tylko ocalić bliskich, ale i powstrzymać Zaświaty raz na zawsze?",
        tag: "MortalCombat"
    },
    {
        tytul: "Druga Połowa",
        opis: "Młoda lekarka Magda spotyka przypadkiem tajemniczego i przystojnego dziennikarza Mateusza. Zauroczona nowopoznanym mężczyzną nie wie, że nad rodzącym się uczuciem od początku wisi złe fatum. Sprawy komplikują się bardzo szybko - kiedy wychodzi na jaw, że Magda jest córką trenera reprezentacji Polski, z którym Mateusz od dawna jest w ostrym konflikcie. Sytuacji dodatkowo nie ułatwia fakt, że dziewczyna jest także obiektem westchnień gwiazdy futbolu – Jarosława Kota – który nie cofnie się przed niczym, by zdobyć serce wybranki. Idąc za radą jej przyjaciółki, piłkarz wdraża w życie spektakularny plan „3 x Z” - i chcąc „Zaskoczyć, Zauroczyć i Zaimponować” Magdzie, wykorzystuje przy tym nieograniczone środki finansowe i ułańską fantazję. Mateusz również będzie chciał przypodobać się dziewczynie, ale w kompletnie odmiennym stylu. Czy ma jakiekolwiek szanse w miłosnej grze, w której jeden niespodziewany ruch może postawić go na spalonej pozycji?",
        tag: "DrugaPolowa"
    },
    {
        tytul: "Co w Duszy Gra",
        opis: "Wśród wielu niesamowitych filmów, na które warto czekać, niewątpliwie znajduje się najnowsza produkcja studia Disney and Pixar. Zdarzyło Ci się kiedyś zastanawiać, skąd wzięła się Twoja pasja, Twoje marzenia i zainteresowania? Co sprawia, że jesteś... SOBĄ? W 2020 r. Pixar Animation Studios zabiorą Cię w podróż z ulic Nowego Jorku do nigdy wcześniej niewidzianych kosmicznych sfer i do miejsca, gdzie wszyscy odkrywamy swoje niepowtarzalne osobowości.",
        tag: "CWDG"
    },
]

const sciezka = sessionStorage.getItem("sciezka");
const nazwa = sessionStorage.getItem("nazwa");

const glowny = document.getElementById("glowny");

dane.forEach(function(film){
    if(film.tag === nazwa){
        glowny.children[0].children[0].children[0].setAttribute("src", sciezka);
        
        glowny.children[1].children[0].textContent = film.tytul;
        
        glowny.children[1].children[1].textContent = film.opis;
    }
});