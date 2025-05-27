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
                'image_path' => 'storage/events/images/Aragon-Las-Artes.jpg'
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
                'end_date' => '2025-04-29',
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
                'category_id' => 10,
                'price' => 25,
                'image_path' => 'storage/events/images/v-festival-magia.webp'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'THIS IS MICHAEL',
                'description' => 'This is Michael vuelve a Zaragoza. “El mejor espectáculo sobre EL REY DEL POP en el mundo”. Después del éxito cosechado durante las Fiestas del Pilar 2024 con más de 15.000 espectadores, el show más impresionante regresa a Zaragoza en UNA ÚNICA FUNCIÓN en la Sala Mozart. Una producción de nivel mundial, el show revive la magia y el legado de Michel Jackson con un despliegue escénico que ha conquistado audiencias de Europa y Latinoamérica. Protagonizado por Lenny Jay que logra una interpretación impecable de Michel Jackson.',
                'start_date' => '2025-05-10',
                'end_date' => '2025-05-10',
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
                'end_date' => '2025-05-17',
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
                'end_date' => '2025-05-26',
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
                'end_date' => '2025-05-23',
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
                'end_date' => '2025-04-23',
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
                'end_date' => '2025-04-26',
                'web_url' => 'https://www.zaragoza.es/sede/servicio/cultura/evento/292067',
                'space_id' => 10,
                'category_id' => 11,
                'price' => 2,
                'image_path' => 'storage/events/images/ser_bombera.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Manual básico de lengua de signos para romper corazones',
                'description' => 'Lucho es sordo pero Jaime tiene mucho que contarle. Es invierno, y los dos acaban de conocerse. El primer flirteo en un centro comercial ha desembocado en un paseo por las calles de Madrid, donde sus pasos les encaminan hacia el piso de Jaime. Es evidente que se gustan, y Jaime se esfuerza por vocalizar mucho para que Lucho descifre sus labios. Lucho le enseña a Jaime lengua de signos y se convierte en presencia habitual en la casa, con permiso de Pote, su compañero de piso. Entre palabras y signos se enamoran a trompicones, mientras resquebrajan sus corazas, sus mundos chocan y Jaime indaga en la misteriosa intimidad de Lucho, que incluye a su hermana Juana, también sorda.',
                'start_date' => '2025-06-14',
                'end_date' => '2025-06-14',
                'web_url' => 'https://aragontickets.com/en/events/manual-basico-de-lengua-de-signos-para-romper-corazones',
                'space_id' => 17,
                'category_id' => 3,
                'price' => 10,
                'image_path' => 'storage/events/images/manual_basico_de_lengua_de_signos.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'White Coven + Zålomon Grass + The Riven',
                'description' => 'La Rotonda acogerá a los zaragozanos White Coven embarcados en un Tour de 30 fechas.Tras este concierto darán el salto a su gira por Inglaterra. Contarán con unos invitados de lujo, Zålomon Grass desde Vigo, y The Riven desde Suecia, ambos embarcados en sus respectivas giras por España, presentando sus ultimos trabajos. Trouble in Time es el disco de Zålomon Grass, un talentoso ejercicio de su genuino Cosmic blues. The Riven presenta Visions of Tomorrow, un plan maestro para conquistar el mundo en forma de 11 temas del mejor power rock. ¡Long Live Rock & Roll!',
                'start_date' => '2025-06-14',
                'end_date' => '2025-06-14',
                'web_url' => 'https://btradez.entradium.com/events/white-coven-zalomon-grass-the-riven',
                'space_id' => 9,
                'category_id' => 2,
                'price' => 15.30,
                'image_path' => 'storage/events/images/white_coven.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Madre mía que vergüenza. TEÁTRICAS',
                'description' => 'Todos hemos pasado vergüenza alguna vez. Esta obra retrata, con mucho humor, una serie de situaciones cotidianas donde los personajes enfrentan sus momentos más incómodos. A través de escenas breves e hilarantes, el público se verá reflejado en los tropiezos sociales de los protagonistas: "Madre mía que vergüenza" es una comedia sobre lo ridículos que podemos ser... y lo humanos que somos al reírnos de ello.',
                'start_date' => '2025-06-17',
                'end_date' => '2025-06-17',
                'web_url' => 'https://www.zaragoza.es/sede/servicio/cultura/evento/296171',
                'space_id' => 18,
                'category_id' => 3,
                'price' => 3,
                'image_path' => 'storage/events/images/teatricas_madre_mia_que_verguenza.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Inocentes y culpables. ANTAGONISTAS',
                'description' => '¿Qué pasaría si pudieras escuchar lo que tu familia diría de ti si ya no estuvieras? Bernard, cansado de sentirse ignorado y malinterpretado, idea un plan extremo: para saber, por fin, lo que su familia piensa realmente de él. Así escucha las conversaciones más sinceras y dolorosas que jamás imaginó. Descubre secretos, decepciones... y también cuánto daño ha causado sin darse cuenta. Pero lo que empieza como un "experimento"  termina afectándolo más de lo que esperaba',
                'start_date' => '2025-06-11',
                'end_date' => '2025-06-11',
                'web_url' => 'https://www.zaragoza.es/sede/servicio/cultura/evento/296167',
                'space_id' => 18,
                'category_id' => 3,
                'price' => 4,
                'image_path' => 'storage/events/images/antagonistas.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Rafa Blanca en MALABROCA',
                'description' => 'MALABROCCA nos emocionará, nos hará encariñarnos de este personaje que llegó el último en su primer Giro, y que supo hacer de esta situación la clave de su éxito. A través de esta historia viajaremos por la Italia de los años 40 y 50, de sus pueblos, de la Italia necesitada, que como sucedía también en España, peleará por reconstruir su país apoyándose en las luchas de sus ciclistas y sus deportistas. Desde el patriota Bartali, quien salvará a cientos de judíos clandestinamente, hasta el bar de Garlasco, donde los amigos de Malabrocca escuchaban las gestas del ¿Chino¿ en la vieja radio de la RAI. Desde el glamour de Coppi, hasta la posada de Ninfa, la mujer que espera impaciente que lleguen los éxitos de su marido ciclista. Desde la Yugoslavia de Tito, hasta las posadas más bohemias de París.',
                'start_date' => '2025-06-21',
                'end_date' => '2025-06-21',
                'web_url' => 'https://aragontickets.com/events/malabrocca-zaragoza',
                'space_id' => 17,
                'category_id' => 3,
                'price' => 10,
                'image_path' => 'storage/events/images/event_malabrocca.jpg'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Pasaporte sin cabeza.- Diminutivo',
                'description' => 'Diminutivo es la historia de amor entre un panecillo y una magdalena sorda en un pueblo pequeño, muy pequeño, tan pequeño que se construyó con un saco de harina. Y claro, sus casas son pequeñas, las plazas son pequeñas, y sus habitantes algunos tostados y otros dulces, pero todos ellos muy pequeños, diminutos. Y es allí donde vive Pablito, el panadero enamorado de la dulce Magdalena. Y en este pueblo todo es pequeño hasta que llegan los problemas. Parece que Magdalena no le hace caso, él ya no sabe que hacer así que antes de volverse loco buscará nuevas recetas y nuevos ingredientes, así, aunque los problemas crecen ya verás que hay cosas que no se pueden evitar, pero todo se puede arreglar.',
                'start_date' => '2025-06-14',
                'end_date' => '2025-06-14',
                'web_url' => 'https://titeressincabeza.com/project/diminutivo/',
                'space_id' => 19,
                'category_id' => 3,
                'price' => 0,
                'image_path' => 'storage/events/images/pasaporte_sin_cabeza.png'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Afrobrunch Zaragoza Edition (Spain Tour)',
                'description' => 'La fiesta afro más vibrante de ZARAGOZA llega el DOMINGO 15 DE JUNIO de 2025 al SUPERNOVA CLUB, con un line-up internacional de lujo.',
                'start_date' => '2025-06-15',
                'end_date' => '2025-06-15',
                'web_url' => 'https://dice.fm/event/rypopv-afrobrunch-zaragoza-edition-spain-tour-15th-jun-supernova-club-zaragoza-tickets?lng=es',
                'space_id' => 20,
                'category_id' => 2,
                'price' => 17,
                'image_path' => 'storage/events/images/afrobrunch.jpg'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'ExpOtaku Zaragoza 2025',
                'description' => 'Expotaku es una gira de eventos relacionados con el mundo del manga, el anime, los videojuegos, el cosplay y la cultura japonesa.',
                'start_date' => '2025-06-13',
                'end_date' => '2025-06-15',
                'web_url' => 'https://entradium.com/es/events/expotaku-zaragoza-2025',
                'space_id' => 21,
                'category_id' => 8,
                'price' => 21,
                'image_path' => 'storage/events/images/expotaku_zaragoza.jpg'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => "Let's change the rules - Cambiemos las reglas",
                'description' => '«Let’s Change the Rules – Cambiemos las Reglas» es un musical coral participativo que fusiona la música moderna con un mensaje poderoso: la necesidad urgente de reconocer la destrucción ambiental masiva (ecocidio) como un crimen internacional. Este evento se enmarca dentro del proyecto global Choirs for Ecocide Law, impulsado por la organización Stop Ecocide International y respaldado por la Asociación Coral Europea.',
                'start_date' => '2025-06-22',
                'end_date' => '2025-06-22',
                'web_url' => 'https://auditoriozaragoza.com/programacion/lets-change-the-rules-cambiemos-las-reglas/',
                'space_id' => 4,
                'category_id' => 2,
                'price' => 21,
                'image_path' => 'storage/events/images/cambiemos-reglas.jpg'
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
