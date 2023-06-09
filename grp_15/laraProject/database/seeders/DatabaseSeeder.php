<?php

use Illuminate\Database\Seeder;
use App\Models\Azienda;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    //const DESCPROD = '<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est. </p><p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est.</p>';

    public function run() {

    
        DB::table('utente')->insert([
            ['NomeUtente' => 'adminadmin', 'Password' => '$2y$10$Es.FZhMMzXHVazx0C8zuN.IbAbgKMJGY7Kk5CvOJF8Q3yO.XZ1Tsu', 'Nome' => 'alexalex',
             'cognome' => 'user','created_at' => date("Y-m-d H:i:s"), 'Email' => 'alex@verdi.it', 'Telefono' => '1234567890', 
             'Genere' => 'Maschio', 'Livello' => '3','updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomeUtente' => 'staffstaff', 'Password' => '$2y$10$Es.FZhMMzXHVazx0C8zuN.IbAbgKMJGY7Kk5CvOJF8Q3yO.XZ1Tsu', 'Nome' => 'Luca',
            'cognome' => 'Verdi','created_at' => date("Y-m-d H:i:s"), 'Email' => 'luca.verdi6@gmail.com', 'Telefono' => '2222222222', 
            'Genere' => 'Maschio', 'Livello' => '2','updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomeUtente' => 'useruser', 'Password' => '$2y$10$Es.FZhMMzXHVazx0C8zuN.IbAbgKMJGY7Kk5CvOJF8Q3yO.XZ1Tsu', 'Nome' => 'Gervonta',
            'cognome' => 'Davis','created_at' => date("Y-m-d H:i:s"), 'Email' => 'gervonta_tank@gmail.com', 'Telefono' => '3528172508', 
            'Genere' => 'Maschio', 'Livello' => '1','updated_at' => date("Y-m-d H:i:s")
            ],
        
        ]);

        DB::table('azienda')->insert([
            ['Nome' => 'Jordan', 'Tipologia' => 'srl', 'Localizzazione' => 'Chicago', 'RagioneSociale' => 'vestiti',
            'Descrizione' => 'Abbigliamento sportivo', 'Immagine' => 'Jordan_Logo.png', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['Nome' => 'Nike', 'Tipologia' => 'srl', 'Localizzazione' => 'Ancona', 'RagioneSociale' => 'vestiti',
            'Descrizione' => 'Marca di vestiti sportivi e non', 'Immagine' => 'Nike_Logo.png', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['Nome' => 'Adidas', 'Tipologia' => 'srl', 'Localizzazione' => 'Tokyo', 'RagioneSociale' => 'vestiti',
            'Descrizione' => 'Marca di vestiti sportivi progettata per uso quotidiano ma anche in ambito sportivo', 
            'Immagine' => 'Adidas_Logo.png', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['Nome' => 'Under Armour', 'Tipologia' => 'srl', 'Localizzazione' => 'Roma', 'RagioneSociale' => 'abbigliamento sportivo',
            'Descrizione' => 'Abbigliamento sportivo progettato per rendere più comodi i tuoi allenamenti. Sponsor di atleti e attori famosi come Stephen Curry e The Rock.', 
            'Immagine' => 'UnderArmour_Logo.png', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

        ]);


        DB::table('promozioni')->insert([
            ['NomePromo' => 'scarpeNike20%', 'Azienda' => '2', 'DescrizioneSconto' => 'Scarpe Nike al 20% di sconto solo per questo mese. Affrettati. Presenta il coupon in cassa per usufruire dello sconto.',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '20.00', 'Scadenza' => '2023-06-30', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomePromo' => 'JordanSummerSales2023', 'Azienda' => '1', 'DescrizioneSconto' => 'Sconto del 10% su ogni prodotto Jordan fino a fine estate. Presenta il coupon in cassa per usufruire dello sconto.',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '10.00', 'Scadenza' => '2023-08-31', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomePromo' => 'JordanNBAFinals', 'Azienda' => '1', 'DescrizioneSconto' => 'Sconto del 25% su tutte le canotte NBA valida fino a fine NBA finals. Per usufruire del coupon inserire il codice coupon durante il pagamento nella sezione INSERISCI COUPON. Usufruibile solo sul sito https://www.nike.com/jordan',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '25.00', 'Scadenza' => '2023-06-22', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],
            ['NomePromo' => 'JordanDiscount', 'Azienda' => '1', 'DescrizioneSconto' => 'Sconto del 30% sulle Jordan high. Presenta il coupon in cassa per usufruire dello sconto.',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '30.00', 'Scadenza' => '2023-08-31', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomePromo' => 'JordanCap', 'Azienda' => '1', 'DescrizioneSconto' => 'Sconto del 45% su tutti i cappelli Jordan. Per usufruire del coupon inserire il codice coupon durante il pagamento nella sezione INSERISCI COUPON. Usufruibile solo sul sito https://www.nike.com/jordan',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '45.00', 'Scadenza' => '2023-06-22', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],
            ['NomePromo' => 'JordanSummer', 'Azienda' => '1', 'DescrizioneSconto' => 'Sconto del 2X1 su tutti i prodotti Jordan. Acquista due articoli e presenta il coupon in cassa, quello col costo minore non lo paghi.',
            'Tipologia' => '"2X1', 'PercentualeSconto' => null, 'Scadenza' => '2023-08-31', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomePromo' => 'JordanCrazy', 'Azienda' => '1', 'DescrizioneSconto' => 'Incredibile 3X2 sui prodotti NBA! Per usufruire del coupon inserire il codice coupon durante il pagamento nella sezione INSERISCI COUPON. Usufruibile solo sul sito https://www.nike.com/jordan',
            'Tipologia' => '3X2', 'PercentualeSconto' => null, 'Scadenza' => '2023-06-22', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],
            ['NomePromo' => 'JordanPSG', 'Azienda' => '1', 'DescrizioneSconto' => 'Incredibile sconto del 20% sulle maglie ufficiali e le repliche del PSG! Per usufruire del coupon inserire il codice coupon durante il pagamento nella sezione INSERISCI COUPON. Usufruibile solo sul sito https://www.nike.com/jordan',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '20.00', 'Scadenza' => '2023-06-22', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomePromo' => 'AdidaShoes2023', 'Azienda' => '3', 'DescrizioneSconto' => 'Sconto del 15% su tutte le scarpe Adidas. Presenta il coupon in cassa per usufruire dello sconto.',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '15.00', 'Scadenza' => '2023-06-22', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomePromo' => 'Under Armour 3x2', 'Azienda' => '4', 'DescrizioneSconto' => 'Se acquisti tre capi di abbigliamento il meno caro è gratuito. Presenta il coupon in cassa per usufruire dello sconto.',
            'Tipologia' => '3X2', 'PercentualeSconto' => NULL, 'Scadenza' => '2023-06-27', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],
            
        ]);

        DB::table('coupon')->insert([
            ['CodiceCoupon' => 'JMwaB5ch', 'Utente' => '3', 'Promozione' => '2', 'Data' => '2023-06-07', 'Ora' => '14:15:28', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],
            
        ]);

        DB::table('faq')->insert([
            ['Domanda' => 'Come posso generare un coupon?', 
            'Risposta' => 'Basta cliccare su una promozione, e cliccare genera coupon.',
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['Domanda' => 'Dove posso contattarvi?', 
            'Risposta' => 'Puoi contattarci nelle info presenti nella sezione “chi siamo”',
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['Domanda' => 'Come posso registrarmi sul sito?', 
            'Risposta' => 'Clicca su iscriviti in alto a destra e inserisci i dati',
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['Domanda' => 'Quanti coupon posso generare?', 
            'Risposta' => 'Puoi generare un solo coupon per promozione',
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

        ]);

        DB::table('assegnazione')->insert([
            ['Operatore' => '2', 'Azienda' => '1', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['Operatore' => '2', 'Azienda' => '2', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['Operatore' => '2', 'Azienda' => '3', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['Operatore' => '2', 'Azienda' => '4', 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
        ],

        ]);


    }

}
