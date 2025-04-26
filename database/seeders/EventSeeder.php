<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'name' => 'Aragón y las Artes 1957-1975',
                'description' => 'Exposición sobre la relación entre Aragón y las Artes durante el periodo de 1957 a 1975.',
                'start_date' => '2023-11-16',
                'end_date' => '2025-08-31',
                'web_url' => 'https://iaacc.es/events/aragon-y-las-artes-1957-1975/?occurrence=2023-11-16',
                'space_id' => 1,
                'category_id' => 9,
                'image_path' => 'storage/events/images/Aragon-Las-Artes.webp'
            ]
        ]);

        DB::table('events')->insert(
            [
                'name' => '[REC]UERDOS. La vida a través del cine doméstico',
                'description' => 'En esta exposición se recuperan relatos pasados y actuales a través de las miradas cotidianas de las familias de cada época: un recorrido que nos permite ahondar en las relaciones entre imagen, realidad y memoria.',
                'start_date' => '2025-02-28',
                'end_date' => '2025-06-08',
                'web_url' => 'https://caixaforum.org/es/zaragoza/p/recuerdos_a168538824',
                'space_id' => 3,
                'category_id' => 9,
                'price' => 6,
                'image_path' => 'storage/events/images/recuerdos-caixaforum.jpg'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Tardeo poético: poderío femenino en la copla, con Diana Navarro y Lidia García',
                'description' => 'Entre el mandato social y la rebeldía, las mujeres de la copla transgredían la moral importante hasta el punto de constituirse como contramodelos del ama de casa de la época. Su legado arrebatado todavía nos acompaña. He aquí el punto de partida de una conversación entre la cantante y artista malagueña Diana Navarro y la investigadora Lidia García, autora del pódcast ¡Ay, campaneras!. Juntas, entre la palabra y la canción, pondrán en valor el poderío femenino en la copla.',
                'start_date' => '2025-04-29',
                'web_url' => 'https://caixaforum.org/es/zaragoza/p/tardeo-poetico-con-diana-navarro-y-lidia-garcia_a169692497',
                'space_id' => 3,
                'category_id' => 11,
                'price' => 6,
                'image_path' => 'storage/events/images/tardeo-politico.jpg'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'MAITE UBIDE. UNA VIDA ENTRE TINTAS',
                'description' => 'El atractivo que la materia, el sentirla y transformarla con sus manos, ha ejercido sobre Maite Ubide (Zaragoza, 1939), ha sido el motor más poderoso de una vida pasada “entre tintas”. Formada en Caracas, Ámsterdam, Belgrado y Barcelona, llega a su ciudad natal en 1964 y entra en contacto con el Grupo Zaragoza, cuyas inquietudes por la interrelación de las artes y el activismo cultural comparte, y junto con ellos pone en marcha el Taller Libre de Grabado. Allí, como posteriormente en su propio taller, bajo el magisterio de Maite Ubide se introducen en las técnicas del grabado numerosos artistas.',
                'start_date' => '2025-03-12',
                'end_date' => '2025-08-31',
                'web_url' => 'https://iaacc.es/events/maite-ubide/?occurrence=2025-03-12',
                'space_id' => 1,
                'category_id' => 9,
                'image_path' => 'storage/events/images/maite-ubide.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'EL MÉDICO, EL MUSICAL',
                'description' => 'El Médico es un musical basado en la novela de Noah Gordon, El Médico. Fue estrenado en octubre de 2018 en el Teatro Nuevo Apolo de Madrid, y en tan sólo 3 meses se convirtió en la obra número uno de la crítica especializada en el panorama escénico español.',
                'start_date' => '2025-05-01',
                'end_date' => '2025-05-18',
                'web_url' => 'https://teatroprincipalzaragoza.com/el-medico/',
                'space_id' => 2,
                'category_id' => 2,
                'price' => 60,
                'image_path' => 'storage/events/images/el-medico.webp'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'V FESTIVAL INTERNACIONAL DE MAGIA CIUDAD DE ZARAGOZA',
                'description' => 'Vuelve la magia al Principal y lo hace con 5 fechas de gala internacional y 2 de gala infantil.
Descubre en la web los nombres de los magos que actuarán en esta quinta edición.',
                'start_date' => '2025-05-21',
                'end_date' => '2025-05-25',
                'web_url' => 'https://teatroprincipalzaragoza.com/v-festival-internacional-de-magia-ciudad-de-zaragoza/',
                'space_id' => 2,
                'category_id' => 12,
                'price' => 25,
                'image_path' => 'storage/events/images/v-festival-magia.webp'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'THIS IS MICHAEL',
                'description' => 'This is Michael vuelve a Zaragoza. “El mejor espectáculo sobre EL REY DEL POP en el mundo”. Después del éxito cosechado durante las Fiestas del Pilar 2024 con más de 15.000 espectadores, el show más impresionante regresa a Zaragoza en UNA ÚNICA FUNCIÓN en la Sala Mozart. Una producción de nivel mundial, el show revive la magia y el legado de Michel Jackson con un despliegue escénico que ha conquistado audiencias de Europa y Latinoamérica. Protagonizado por Lenny Jay que logra una interpretación impecable de Michel Jackson.',
                'start_date' => '2025-05-10',
                'web_url' => 'https://auditoriozaragoza.com/programacion/this-is-michael/',
                'space_id' => 4,
                'category_id' => 2,
                'price' => 55,
                'image_path' => 'storage/events/images/this-is-michael.jpg'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Historias para no olvidar',
                'description' => 'Hace mucho, mucho tiempo, en un país lejano, un niño vino para cambiarlo todo. La manera de entretener, divertir, de pasar miedo, de reír y de llorar y, en definitiva, de sentir. Esta exposición es el homenaje necesario para el hombre que nos cambió la forma de ver la televisión: Narciso Ibáñez Serrador',
                'start_date' => '2025-04-10',
                'end_date' => '2025-08-10',
                'web_url' => 'https://www.zaragoza.es/sede/portal/museos/centro-historias/servicio/cultura/evento/294508',
                'space_id' => 5,
                'category_id' => 9,
                'image_path' => 'storage/events/images/historias-para-no-olvidar.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'OWN Zaragoza',
                'description' => 'Noviembre feria Zaragoza OWN Zaragoza 2025 vive explora juega destacados comunidad contenidos destacados esports torneos pros de esports talents influencers & meet and greet podcasts podcasts en vivo música conciertos de artistas y bandas sonoras. 3 días de actividades exclusivas esports, influencers podcast, music y contenidos de la comunidad lan 3.',
                'start_date' => '2025-11-21',
                'end_date' => '2025-11-23',
                'web_url' => 'https://www.openworldnow.com/own-zaragoza/',
                'space_id' => 7,
                'category_id' => 10,
                'price' => 15,
                'image_path' => 'storage/events/images/own-2025.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'HOVIK KEUCHKERIAN - Grito',
                'description' => 'Probablemente no haya un lugar en el mundo en el que la libertad de expresión tenga tanto valor, sentido y significado como en el escenario cuando lo pisa un cómico. Hovik Keuchkerian vuelve al Stand Up después de más de quince años alejado del circuito de la comedia. Vuelve con GRITO, un espectáculo en el que conecta con su esencia de cómico. Con este show, recupera un discurso ácido, profundo que por momentos hará sentir incómodo al espectador.',
                'start_date' => '2025-05-17',
                'web_url' => 'https://www.teatrodelasesquinas.com/es/programacion/c/489-hovik-keuchkerian.html',
                'space_id' => 8,
                'category_id' => 3,
                'price' => 28,
                'image_path' => 'storage/events/images/hovik-grito.webp'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'TANTAS FLORES - Chevi Muraday y Alejandro Palomas',
                'description' => 'Cumplidos los cincuenta, y tras décadas sin haber mantenido el contacto, dos hombres se reencuentran de forma fortuita en el parque donde jugaban de niños. El encuentro coincide con la muerte de la madre de uno de ellos y los enfrentará al recuerdo de una amistad de infancia que quedó truncada por un abrupto y violento final. En Tantas flores la reconciliación, la orfandad, del perdón, el humor, la desconfianza mutua y la recolocación del pasado en un ejercicio mutuo de recuerdo y honestidad llevan a estos dos hombres -que serán también los niños que fueron y a la vez sus propias madres- a enfrentarse a un nuevo paso que la vida les propone.',
                'start_date' => '2025-05-21',
                'end_date' => '2025-05-22',
                'web_url' => 'https://www.teatrodelasesquinas.com/es/programacion/c/601-tantas-flores.html',
                'space_id' => 8,
                'category_id' => 3,
                'price' => 19,
                'image_path' => 'storage/events/images/tantasflores.webp'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Band Jovi (Tributo Bon Jovi)',
                'description' => 'Band Jovi está considerada la mejor banda tributo a nivel europeo del mítico grupo de rock Bon Jovi. Sus miembros han sentido desde siempre una gran devoción por la música de la banda original, por lo que  en 2012 decidieron lanzarse a la aventura y la carretera para rendir homenaje a la banda capitaneada por el mítico Jon Bon Jovi. Su cuidada puesta en escena les ha llevado a recibir unas críticas muy positivas de cada concierto, habiendo tenido que colgar  el cartel de aforo completo en numerosas ocasiones. ',
                'start_date' => '2025-05-26',
                'web_url' => 'https://www.taquilla.com/entradas/band-jovi-tributo-bon-jovi-',
                'space_id' => 9,
                'category_id' => 2,
                'price' => 18,
                'image_path' => 'storage/events/images/band-jovi.jpeg'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'The Novus Band',
                'description' => '',
                'start_date' => '2025-05-23',
                'web_url' => 'https://www.taquilla.com/entradas/the-novus-band',
                'space_id' => 9,
                'category_id' => 2,
                'price' => 9.7,
                'image_path' => 'storage/events/images/the-novus-band.jpeg'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Centrifugado',
                'description' => 'Jano es un aspirante a limpiador. Debe superar unas cuantas pruebas para conseguir entrar en esta exigente empresa de limpieza y para ello, barre la tristeza, friega cualquier residuo de desilusión, y saca brillo a sus emociones para conseguirlo. Centrifuga la alegría, echa el freno de su carro ante cualquier adversidad y pone en marcha las sonrisas del jurado que lo ha de examinar. Sin duda en un aspirante especial. ¿Conseguirá ser el elegido? Espectáculo de teatro y clown cargado de números visuales, pantomima, música e interacción con el público.',
                'start_date' => '2025-04-23',
                'web_url' => 'https://www.zaragoza.es/sede/servicio/cultura/evento/294956',
                'space_id' => 10,
                'category_id' => 3,
                'image_path' => 'storage/events/images/centrifugado.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Visitas Museos y Mujeres 2025. Ser bombera: fuego y agua',
                'description' => 'El programa Museos y mujeres ofrece visitas guiadas que pretender realizar una relectura de sus colecciones para posicionar a la mujer como sujeto activo en la historia y la historia del arte. Una de las integrantes del cuerpo contará su experiencia y la historia de las mujeres en esta profesión.',
                'start_date' => '2025-04-26',
                'web_url' => 'https://www.zaragoza.es/sede/servicio/cultura/evento/292067',
                'space_id' => 10,
                'category_id' => 11,
                'price' => 2,
                'image_path' => 'storage/events/images/ser_bombera.png'
            ]
        );

        /* DB::table('events')->insert(
            [
                'name' => '',
                'description' => '',
                'start_date' => '',
                'end_date' => '',
                'web_url' => '',
                'space_id' => '',
                'category_id' => '',
                'price' => '',
                'image_path' => 'storage/events/images/'
            ]
        ); */
    }
}
