<?php

use Illuminate\Database\Seeder;

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
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '20.00', 'Scadenza' => '2023-06-31', 'Immagine' => NULL, 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomePromo' => 'JordanSummerSales2023', 'Azienda' => '1', 'DescrizioneSconto' => 'Sconto del 10% su ogni prodotto Jordan fino a fine estate. Presenta il coupon in cassa per usufruire dello sconto.',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '10.00', 'Scadenza' => '2023-08-31', 'Immagine' => NULL, 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomePromo' => 'JordaNBAFinals', 'Azienda' => '1', 'DescrizioneSconto' => 'Sconto del 25% su tutte le canotte NBA in vista delle finali NBA che stanno per iniziare. Offerta valida fino a pochi giorni dopo le NBA finals. Per usufruire del coupon inserire il codice coupon durante il pagamento nella sezione INSERISCI COUPON. Usufruibile solo sul sito https://www.nike.com/jordan',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '25.00', 'Scadenza' => '2023-06-22', 'Immagine' => NULL, 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

            ['NomePromo' => 'AdidaShoes2023', 'Azienda' => '3', 'DescrizioneSconto' => 'Sconto del 15% su tutte le scarpe Adidas. Presenta il coupon in cassa per usufruire dello sconto.',
            'Tipologia' => 'Sconto', 'PercentualeSconto' => '15.00', 'Scadenza' => '2023-06-22', 'Immagine' => NULL, 
            'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")
            ],

        ]);


    }

}
