@extends('layouts.master')
@section('content')
   

                <main class="flex-1">
                    <div class="px-40 flex  justify-center py-5 mt-0 pt-0">
                        <div class="layout-content-container flex flex-col max-w-none flex-1">
                            <div class="@container">
                                <div class="@[480px]:p-4">
                                    <div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-lg items-start justify-start px-4 pb-10 @[480px]:px-10"
                                        style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("images/start1.jpeg");'>

                                        <div class="flex flex-col gap-2 text-left pt-20 pb-10">
                                            <h1
                                                class="mt-0 pt-0 text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                                Willkommen bei complete it <br> und compservice
                                            </h1>
                                            <h2
                                                class="pt-10 text-white text-xl font-normal leading-normal  @[480px]:font-normal @[480px]:leading-normal max-w-[900px]">
                                                Ihr Spezialist für Laptops, Computer und Gaming-PCs. <br> Wir bieten auch
                                                Reparaturen und bauen individuelle <br>
                                                Gaming-Systeme.
                                            </h2>
                                        </div>
                                        {{-- <button --}}
                                            {{-- class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-green-500 hover:bg-[#ff6600] text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
                                            <span class="truncate">Jetzt einkaufen</span>
                                        </button> --}}
                                         <a href="{{ route('products.index') }}" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-green-500 hover:bg-[#ff6600] text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"><span class="truncate">Jetzt einkaufen</span></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    >




                    <!-- ---------------------unsere firma----------------------------------- -->
                    <section>


                        <div class="row why-cics__row">
                            <div class="col col-6 why-cics__left">
                                <div class="col why-cics__left">
                                    <h1>WARUM SOLLTEN SIE SICH
                                        IM JAHR 2025 <br>FÜR IHRE LAPTOP-REPARATUR FÜR CICS ENTSCHEIDEN?</h1>
                                    <p class="why-cics__desc">
                                        Das CICS Computer Service Centre ist für seinen erstklassigen und zuverlässigen
                                        Laptop-Reparaturservice in Singapur bekannt. Hier erfahren Sie, warum es zu den
                                        besten Laptop-Reparaturwerkstätten des Landes zählt:
                                    </p>
                                    <ul class="why-cics__list">
                                        <li>
                                            <button class="accordion-btn">
                                                <span>Handel mit PCs und Laptops:</span>
                                                <span class="plus">+</span>
                                            </button>
                                            <div class="accordion-content">
                                                <p>

                                                    Verkauf von neuen und gebrauchten PCs und Laptops, einschließlich dem
                                                    individuellen Zusammenbau von Gaming-PCs nach Kundenwunsch. Kunden
                                                    profitieren von maßgeschneiderten Systemen, die exakt auf ihre
                                                    Anforderungen und Spiele abgestimmt sind. Die Auswahl und Kombination
                                                    der Komponenten erfolgt nach den persönlichen Wünschen, um maximale
                                                    Performance und Zuverlässigkeit zu gewährleisten
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <button class="accordion-btn">
                                                <span>Handel mit PC- und Laptop-Teilen:
                                                </span>
                                                <span class="plus">+</span>
                                            </button>
                                            <div class="accordion-content">
                                                <p>

                                                    Vertrieb von Komponenten, Zubehör und Ersatzteilen für Computer und
                                                    Laptops. Kunden können aus einer breiten Auswahl aktueller und
                                                    hochwertiger Hardware wählen, um ihre Geräte individuell aufzurüsten
                                                    oder zu reparieren
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <button class="accordion-btn">
                                                <span>Reparaturservice:</span>
                                                <span class="plus">+</span>
                                            </button>
                                            <div class="accordion-content">
                                                <p>

                                                    Durchführung von Reparaturen und Wartungsarbeiten an PCs und Laptops,
                                                    einschließlich Fehlerdiagnose, Austausch defekter Bauteile und
                                                    Systemoptimierung
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <button class="accordion-btn">
                                                <span>IT-Administration und Support:</span>
                                                <span class="plus">+</span>
                                            </button>
                                            <div class="accordion-content">
                                                <p>
                                                    Unterstützung von Unternehmen und Privatpersonen in allen IT-Fragen,
                                                    insbesondere bei der Installation, Wartung und Verbesserung von
                                                    IT-Systemen. Das Angebot umfasst IT-Beratung, Einrichtung und Betreuung
                                                    von Netzwerken, IT-Sicherheit, Backup-Lösungen sowie fortlaufenden
                                                    Support zur Sicherstellung eines reibungslosen IT-Betriebs
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col col-6 ">
                                <img src="images/firma.jpeg" alt="cics Bild" />
                            </div>
                        </div>

                    </section>


                    <script>document.querySelectorAll('.accordion-btn').forEach(btn => {
                            btn.addEventListener('click', function () {
                                const li = btn.closest('li');
                                const open = li.classList.contains('open');
                                // Optional: Nur eine gleichzeitig öffnen
                                document.querySelectorAll('.why-cics__list li').forEach(item => {
                                    item.classList.remove('open');
                                    item.querySelector('.accordion-btn').classList.remove('active');
                                });
                                if (!open) {
                                    li.classList.add('open');
                                    btn.classList.add('active');
                                }
                            });
                        });</script>

                    <!-- ---------------------serv2------------------------------- -->

                    <div class="container2  bg-gray-100 mt-8 mb-8 pt-8 pb-8 px-4">
                        <div class="header">

                            <div class="title">Wir sind mehr als ein Laptop-Reparatur und Complete IT Service</div>
                        </div>
                        <div class="services-grid grid grid-cols-1 md:grid-cols-4 gap-6">
                            <!-- Service 1 -->
                            <div class="service-card ">
                                <div class="thumb-isotope">
                                    <div class="thumbnail clearfix mt-6 mb-6 pt-4 pb-4">
                                        <figure>
                                            <center><img src="images/serv1.png" width="150px" alt="">
                                                <!-- <a class="icon-txt" href="#">Laptop Upgrade</a> -->
                                                <a class="icon-txt" href="" onclick="return false"
                                                    ;>Garantie-Service</a><em></em>
                                            </center>

                                            <!-- <h1><center>Laptop Upgrade</center></h1> -->
                                        </figure>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <!-- Service 2 -->
                            <div class="service-card">
                                <div class="thumb-isotope">
                                    <div class="thumbnail clearfix mt-6 mb-6 pt-4 pb-4">
                                        <figure>
                                            <center><img src="images/serv2.png" width="150px" alt="">
                                                <!-- <a class="icon-txt" href="#">Laptop Upgrade</a> -->
                                                <a class="icon-txt" href="" onclick="return false" ;>Laptop
                                                    Upgrade</a><em></em>
                                            </center>

                                            <!-- <h1><center>Laptop Upgrade</center></h1> -->
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service 3 -->
                            <div class="service-card">
                                <div class="thumb-isotope">
                                    <div class="thumbnail clearfix mt-6 mb-6 pt-4 pb-4">
                                        <figure>
                                            <center><img src="images/gaming.jpeg" width="150px" alt="">
                                                <!-- <a class="icon-txt" href="#">Laptop Upgrade</a> -->
                                                <a class="icon-txt" href="" onclick="return false" ;>Computer
                                                    Gaming</a><em></em>
                                            </center>

                                            <!-- <h1><center>Laptop Upgrade</center></h1> -->
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service 4 -->
                            <div class="service-card">
                                <div class="thumb-isotope">
                                    <div class="thumbnail clearfix mt-6 mb-6 pt-4 pb-4">
                                        <figure>
                                            <center><img src="images/serv4.png" width="150px" alt="">
                                                <!-- <a class="icon-txt" href="#">Laptop Upgrade</a> -->
                                                <a class="icon-txt" href="" onclick="return false"
                                                    ;>Laptop-Reparatur</a><em></em>
                                            </center>

                                            <!-- <h1><center>Laptop Upgrade</center></h1> -->
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service 5 -->
                            <div class="service-card">
                                <div class="thumb-isotope">
                                    <div class="thumbnail clearfix mt-6 mb-6 pt-4 pb-4">
                                        <figure>
                                            <center><img src="images/serv5.png" width="150px" alt="">
                                                <!-- <a class="icon-txt" href="#">Laptop Upgrade</a> -->
                                                <a class="icon-txt" href="" onclick="return false"
                                                    ;>Speicherupgrade</a><em></em>
                                            </center>

                                            <!-- <h1><center>Laptop Upgrade</center></h1> -->
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service 6 -->
                            <div class="service-card">
                                <div class="thumb-isotope">
                                    <div class="thumbnail clearfix mt-6 mb-6 pt-4 pb-4">
                                        <figure>
                                            <center><img src="images/serv6.png" width="150px" alt="">
                                                <!-- <a class="icon-txt" href="#">Laptop Upgrade</a> -->
                                                <a class="icon-txt" href="" onclick="return false"
                                                    ;>Windows-Neuformatierung</a><em></em>
                                            </center>

                                            <!-- <h1><center>Laptop Upgrade</center></h1> -->
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service 7 -->
                            <div class="service-card">
                                <div class="thumb-isotope">
                                    <div class="thumbnail clearfix mt-6 mb-6 pt-4 pb-4">
                                        <figure>
                                            <center><img src="images/serv7.png" width="150px" alt="">
                                                <!-- <a class="icon-txt" href="#">Laptop Upgrade</a> -->
                                                <a class="icon-txt" href="" onclick="return false"
                                                    ;>Softwareinstallation</a><em></em>
                                            </center>

                                            <!-- <h1><center>Laptop Upgrade</center></h1> -->
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Service 8 -->
                            <div class="service-card">
                                <div class="thumb-isotope">
                                    <div class="thumbnail clearfix mt-6 mb-6 pt-4 pb-4">
                                        <figure>
                                            <center><img src="images/serv8.png" width="150px" alt="">
                                                <!-- <a class="icon-txt" href="#">Laptop Upgrade</a> -->
                                                <a class="icon-txt" href="" onclick="return false"
                                                    ;>Virenlösung</a><em></em>
                                            </center>

                                            <!-- <h1><center>Laptop Upgrade</center></h1> -->
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                    <!-- ---------------------serv2------------------------------- -->

                    <div class="container1">
                        <div class="header">

                            <div class="title">Welche Laptop &amp; Computerprobleme reparieren wir?</div>
                        </div>
                        <div class="services-grid">
                            <!-- Service 1 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card1.jpeg" alt="Screen Replacement">
                                <div class="service-title">Bauen Sie Ihren PC</div>
                            </div>
                            <!-- Service 2 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card2.jpeg" alt="Laptop Fan Replacement">
                                <div class="service-title">Laptop-Bildschirm austauschen</div>
                            </div>
                            <!-- Service 3 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card3.jpeg" alt="Battery Replacement">
                                <div class="service-title">Laptop-Lüfter und -Kühler austauschen</div>
                            </div>
                            <!-- Service 4 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card4.jpeg" alt="Keyboard Repair">
                                <div class="service-title">Laptop-Akku austauschen</div>
                            </div>
                            <!-- Service 5 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card5.jpeg" alt="Cannot Power On">
                                <div class="service-title">Laptop-Tastatur austauschen</div>
                            </div>
                            <!-- Service 6 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card6.jpeg" alt="Hinge Repair">
                                <div class="service-title">Einschalten nicht möglich</div>
                            </div>
                            <!-- Service 7 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card7.jpeg" alt="Water Damage">
                                <div class="service-title">Scharnierreparatur</div>
                            </div>
                            <!-- Service 8 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card8.jpeg" alt="Connection Problem">
                                <div class="service-title">Verbindungsproblem</div>
                            </div>
                            <!-- Service 9 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card9.jpeg" alt="Screen Replacement">
                                <div class="service-title">Computer Gaming Bauen</div>
                            </div>
                            <!-- Service 10 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card10.jpeg" alt="Screen Replacement">
                                <div class="service-title">Wasserschaden</div>
                            </div>
                            <!-- Service 11 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card11.jpeg" alt="Screen Replacement">
                                <div class="service-title">Austausch der Laptop-Festplatte</div>
                            </div>
                            <!-- Service 12 -->
                            <div class="service-card">
                                <img class="service-img" src="images/card12.jpeg" alt="Screen Replacement">
                                <div class="service-title">Laptop-Touchpad austauschen</div>
                            </div>
                        </div>
                    </div>
                    <!-- -----------------uns------------------------- -->
                    <div class="hero-section">
                        <div class="hero-content">
                            <h1 class="hero-title">Zuverlässige PC-Reparaturwerkstatt in Deutschland</h1>
                            <div class="hero-desc">
                                CICS ist Ihr vertrauenswürdiger lokaler
                                <a href="#">PC-ReparaturShop</a> bietet schnelle und günstige Services für Desktop-PCs und
                                Laptops.
                                Ob Probleme mit Computerteilen, Systemabstürzen oder Leistungsproblemen – unsere erfahrenen
                                Techniker helfen Ihnen gerne weiter.
                            </div>
                            <div class="hero-desc">
                                Wir sind auf die Diagnose und Reparatur einer breiten Palette von PC-Problemen aller großen
                                Marken spezialisiert, darunter Macbook, Dell, HP, Lenovo, Asus, Acer, MSI, Microsoft und
                                kundenspezifische Anlagen.
                            </div>
                        </div>
                    </div>
                    <!-- -----------------repair ----------------------- -->
                    <div class="repair-process-section">
                        <div class="repair-process-title">Unser Reparaturprozess</div>
                        <div class="repair-steps">
                            <!-- Schritt 1 -->
                            <div class="repair-step">
                                <div class="repair-step-number">1</div>
                                <div class="repair-step-title">Gerät abgeben</div>
                                <img class="repair-step-img  " src="images/schritt1.jpeg" alt="Gerät abgeben">
                            </div>
                            <!-- Schritt 2 -->
                            <div class="repair-step">
                                <div class="repair-step-number">2</div>
                                <div class="repair-step-title">Diagnose, Kostenvorschlag & Reparatur</div>
                                <img class="repair-step-img" src="images/schritt2.jpeg" alt="Diagnose und Reparatur">
                            </div>
                            <!-- Schritt 3 -->
                            <div class="repair-step">
                                <div class="repair-step-number">3</div>
                                <div class="repair-step-title">Abholung , Senden</div>
                                <img class="repair-step-img" src="images/schritt3.jpeg" alt="Abholung">
                            </div>
                        </div>
                    </div>

                </main>
                <!-- -------------------------------------------------- -->






@endsection