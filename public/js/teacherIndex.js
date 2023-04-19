var count = 1;

function fetchNames(nameType) {
    let names = [];

    switch (nameType) {
        case 'female':
        names = ["Emma","Isabella","Emily","Madison","Ava","Olivia","Sophia","Abigail","Elizabeth","Chloe","Samantha","Addison","Natalie","Mia","Alexis","Alyssa","Hannah","Ashley","Ella","Sarah","Grace","Taylor","Brianna","Lily","Hailey","Anna","Victoria","Kayla","Lillian","Lauren","Kaylee","Allison","Savannah","Nevaeh","Gabriella","Sofia","Makayla","Avery","Riley","Julia","Leah","Aubrey","Jasmine","Audrey","Katherine","Morgan","Brooklyn","Destiny","Sydney","Alexa","Kylie","Brooke","Kaitlyn","Evelyn","Layla","Madeline","Kimberly","Zoe","Jessica","Peyton","Alexandra","Claire","Madelyn","Maria","Mackenzie","Arianna","Jocelyn","Amelia","Angelina","Trinity","Andrea","Maya","Valeria","Sophie","Rachel","Vanessa","Aaliyah","Mariah","Gabrielle","Katelyn","Ariana","Bailey","Camila","Jennifer","Melanie","Gianna","Charlotte","Paige","Autumn","Payton","Faith","Sara","Isabelle","Caroline","Genesis","Isabel","Mary","Zoey","Gracie","Megan","Haley","Mya","Michelle","Molly","Stephanie","Nicole","Jenna","Natalia","Sadie","Jada","Serenity","Lucy","Ruby","Eva","Kennedy","Rylee","Jayla","Naomi","Rebecca","Lydia","Daniela","Bella","Keira","Adriana","Lilly","Hayden","Miley","Katie","Jade","Jordan","Gabriela","Amy","Angela","Melissa","Valerie","Giselle","Diana","Amanda","Kate","Laila","Reagan","Jordyn","Kylee","Danielle","Briana","Marley","Leslie","Kendall","Catherine","Liliana","Mckenzie","Jacqueline","Ashlyn","Reese","Marissa","London","Juliana","Shelby","Cheyenne","Angel","Daisy","Makenzie","Miranda","Erin","Amber","Alana","Ellie","Breanna","Ana","Mikayla","Summer","Piper","Adrianna","Jillian","Sierra","Jayden","Sienna","Alicia","Lila","Margaret","Alivia","Brooklynn","Karen","Violet","Sabrina","Stella","Aniyah","Annabelle","Alexandria","Kathryn","Skylar","Aliyah","Delilah","Julianna","Kelsey","Khloe","Carly","Amaya","Mariana","Christina","Alondra","Tessa","Eliana","Bianca","Jazmin","Clara","Vivian","Josephine","Delaney","Scarlett","Elena","Cadence","Alexia","Maggie","Laura","Nora","Ariel","Elise","Nadia","Mckenna","Chelsea","Lyla","Alaina","Jasmin","Hope","Leila","Caitlyn","Cassidy","Makenna","Allie","Izabella","Eden","Callie","Haylee","Caitlin","Kendra","Karina","Kyra","Kayleigh","Addyson","Kiara","Jazmine","Karla","Camryn","Alina","Lola","Kyla","Kelly","Fatima","Tiffany","Kira","Crystal","Mallory","Esmeralda","Alejandra","Eleanor","Angelica","Jayda","Abby","Kara","Veronica","Carmen","Jamie","Ryleigh","Valentina","Allyson","Dakota","Kamryn","Courtney","Cecilia","Madeleine","Aniya","Alison","Esther","Heaven","Aubree","Lindsey","Leilani","Nina","Melody","Macy","Ashlynn","Joanna","Cassandra","Alayna","Kaydence","Madilyn","Aurora","Heidi","Emerson","Kimora","Madalyn","Erica","Josie","Katelynn","Guadalupe","Harper","Ivy","Lexi","Camille","Savanna","Dulce","Daniella","Lucia","Emely","Joselyn","Kiley","Kailey","Miriam","Cynthia","Rihanna","Georgia","Rylie","Harmony","Kiera","Kyleigh","Monica","Bethany","Kaylie","Cameron","Teagan","Cora","Brynn","Ciara","Genevieve","Alice","Maddison","Eliza","Tatiana","Jaelyn","Erika","Ximena","April","Marely","Julie","Danica","Presley","Brielle","Julissa","Angie","Iris","Brenda","Hazel","Rose","Malia","Shayla","Fiona","Phoebe","Nayeli","Paola","Kaelyn","Selena","Audrina","Rebekah","Carolina","Janiyah","Michaela","Penelope","Janiya","Anastasia","Adeline","Ruth","Sasha","Denise","Holly","Madisyn","Hanna","Tatum","Marlee","Nataly","Helen","Janelle","Lizbeth","Serena","Anya","Jaslene","Kaylin","Jazlyn","Nancy","Lindsay","Desiree","Hayley","Itzel","Imani","Madelynn","Asia","Kadence","Madyson","Talia","Jane","Kayden","Annie","Amari","Bridget","Raegan","Jadyn","Celeste","Jimena","Luna","Yasmin","Emilia","Annika","Estrella","Sarai","Lacey","Ayla","Alessandra","Willow","Nyla","Dayana","Lilah","Lilliana","Natasha","Hadley","Harley","Priscilla","Claudia","Allisson","Baylee","Brenna","Brittany","Skyler","Fernanda","Danna","Melany","Cali","Lia","Macie","Lyric","Logan","Gloria","Lana","Mylee","Cindy","Lilian","Amira","Anahi","Alissa","Anaya","Lena","Ainsley","Sandra","Noelle","Marisol","Meredith","Kailyn","Lesly","Johanna","Diamond","Evangeline","Juliet","Kathleen","Meghan","Paisley","Athena","Hailee","Rosa","Wendy","Emilee","Sage","Alanna","Elaina","Cara","Nia","Paris","Casey","Dana","Emery","Rowan","Aubrie","Kaitlin","Jaden","Kenzie","Kiana","Viviana","Norah","Lauryn","Perla","Amiyah","Alyson","Rachael","Shannon","Aileen","Miracle","Lillie","Danika","Heather","Kassidy","Taryn","Tori","Francesca","Kristen","Amya","Elle","Kristina","Cheyanne","Haylie","Patricia","Anne","Samara","Skye","Kali","America","Lexie","Parker","Halle","Londyn","Abbigail","Linda","Hallie","Saniya","Bryanna","Bailee","Jaylynn","Mckayla","Quinn","Jaelynn","Jaida"];
        break;
        case 'male':
        names = ["Jacob","Michael","Ethan","Joshua","Daniel","Alexander","Anthony","William","Christopher","Matthew","Jayden","Andrew","Joseph","David","Noah","Aiden","James","Ryan","Logan","John","Nathan","Elijah","Christian","Gabriel","Benjamin","Jonathan","Tyler","Samuel","Nicholas","Gavin","Dylan","Jackson","Brandon","Caleb","Mason","Angel","Isaac","Evan","Jack","Kevin","Jose","Isaiah","Luke","Landon","Justin","Lucas","Zachary","Jordan","Robert","Aaron","Brayden","Thomas","Cameron","Hunter","Austin","Adrian","Connor","Owen","Aidan","Jason","Julian","Wyatt","Charles","Luis","Carter","Juan","Chase","Diego","Jeremiah","Brody","Xavier","Adam","Carlos","Sebastian","Liam","Hayden","Nathaniel","Henry","Jesus","Ian","Tristan","Bryan","Sean","Cole","Alex","Eric","Brian","Jaden","Carson","Blake","Ayden","Cooper","Dominic","Brady","Caden","Josiah","Kyle","Colton","Kaden","Eli","Miguel","Antonio","Parker","Steven","Alejandro","Riley","Richard","Timothy","Devin","Jesse","Victor","Jake","Joel","Colin","Kaleb","Bryce","Levi","Oliver","Oscar","Vincent","Ashton","Cody","Micah","Preston","Marcus","Max","Patrick","Seth","Jeremy","Peyton","Nolan","Ivan","Damian","Maxwell","Alan","Kenneth","Jonah","Jorge","Mark","Giovanni","Eduardo","Grant","Collin","Gage","Omar","Emmanuel","Trevor","Edward","Ricardo","Cristian","Nicolas","Kayden","George","Jaxon","Paul","Braden","Elias","Andres","Derek","Garrett","Tanner","Malachi","Conner","Fernando","Cesar","Javier","Miles","Jaiden","Alexis","Leonardo","Santiago","Francisco","Cayden","Shane","Edwin","Hudson","Travis","Bryson","Erick","Jace","Hector","Josue","Peter","Jaylen","Mario","Manuel","Abraham","Grayson","Damien","Kaiden","Spencer","Stephen","Edgar","Wesley","Shawn","Trenton","Jared","Jeffrey","Landen","Johnathan","Bradley","Braxton","Ryder","Camden","Roman","Asher","Brendan","Maddox","Sergio","Israel","Andy","Lincoln","Erik","Donovan","Raymond","Avery","Rylan","Dalton","Harrison","Andre","Martin","Keegan","Marco","Jude","Sawyer","Dakota","Leo","Calvin","Kai","Drake","Troy","Zion","Clayton","Roberto","Zane","Gregory","Tucker","Rafael","Kingston","Dominick","Ezekiel","Griffin","Devon","Drew","Lukas","Johnny","Ty","Pedro","Tyson","Caiden","Mateo","Braylon","Cash","Aden","Chance","Taylor","Marcos","Maximus","Ruben","Emanuel","Simon","Corbin","Brennan","Dillon","Skyler","Myles","Xander","Jaxson","Dawson","Kameron","Kyler","Axel","Colby","Jonas","Joaquin","Payton","Brock","Frank","Enrique","Quinn","Emilio","Malik","Grady","Angelo","Julio","Derrick","Raul","Fabian","Corey","Gerardo","Dante","Ezra","Armando","Allen","Theodore","Gael","Amir","Zander","Adan","Maximilian","Randy","Easton","Dustin","Luca","Phillip","Julius","Charlie","Ronald","Jakob","Cade","Brett","Trent","Silas","Keith","Emiliano","Trey","Jalen","Darius","Lane","Jerry","Jaime","Scott","Graham","Weston","Braydon","Anderson","Rodrigo","Pablo","Saul","Danny","Donald","Elliot","Brayan","Dallas","Lorenzo","Casey","Mitchell","Alberto","Tristen","Rowan","Jayson","Gustavo","Aaden","Amari","Dean","Braeden","Declan","Chris","Ismael","Dane","Louis","Arturo","Brenden","Felix","Jimmy","Cohen","Tony","Holden","Reid","Abel","Bennett","Zackary","Arthur","Nehemiah","Ricky","Esteban","Cruz","Finn","Mauricio","Dennis","Keaton","Albert","Marvin","Mathew","Larry","Moises","Issac","Philip","Quentin","Curtis","Greyson","Jameson","Everett","Jayce","Darren","Elliott","Uriel","Alfredo","Hugo","Alec","Jamari","Marshall","Walter","Judah","Jay","Lance","Beau","Ali","Landyn","Yahir","Phoenix","Nickolas","Kobe","Bryant","Maurice","Russell","Leland","Colten","Reed","Davis","Joe","Ernesto","Desmond","Kade","Reece","Morgan","Ramon","Rocco","Orlando","Ryker","Brodie","Paxton","Jacoby","Douglas","Kristopher","Gary","Lawrence","Izaiah","Solomon","Nikolas","Mekhi","Justice","Tate","Jaydon","Salvador","Shaun","Alvin","Eddie","Kane","Davion","Zachariah","Dorian","Titus","Kellen","Camron","Isiah","Javon","Nasir","Milo","Johan","Byron","Jasper","Jonathon","Chad","Marc","Kelvin","Chandler","Sam","Cory","Deandre","River","Reese","Roger","Quinton","Talon","Romeo","Franklin","Noel","Alijah","Guillermo","Gunner","Damon","Jadon","Emerson","Micheal","Bruce","Terry","Kolton","Melvin","Beckett","Porter","August","Brycen","Dayton","Jamarion","Leonel","Karson","Zayden","Keagan","Carl","Khalil","Cristopher","Nelson","Braiden","Moses","Isaias","Roy","Triston","Walker","Kale","Jermaine","Leon","Rodney","Kristian","Mohamed","Ronan","Pierce","Trace","Warren","Jeffery","Maverick","Cyrus","Quincy","Nathanael","Skylar","Tommy","Conor","Noe","Ezequiel","Demetrius","Jaylin","Kendrick","Frederick","Terrance","Bobby","Jamison","Jon","Rohan","Jett","Kieran","Tobias","Ari","Colt","Gideon","Felipe","Kenny","Wilson","Orion","Kamari","Gunnar","Jessie","Alonzo","Gianni","Omari","Waylon","Malcolm","Emmett","Abram","Julien","London","Tomas","Allan","Terrell","Matteo","Tristin","Jairo","Reginald","Brent","Ahmad","Yandel","Rene","Willie","Boston","Billy"];
        break;
        case 'surnames':
        names = ["Smith","Johnson","Williams","Brown","Jones","Miller","Davis","Garcia","Rodriguez","Wilson","Martinez","Anderson","Taylor","Thomas","Hernandez","Moore","Martin","Jackson","Thompson","White","Lopez","Lee","Gonzalez","Harris","Clark","Lewis","Robinson","Walker","Perez","Hall","Young","Allen","Sanchez","Wright","King","Scott","Green","Baker","Adams","Nelson","Hill","Ramirez","Campbell","Mitchell","Roberts","Carter","Phillips","Evans","Turner","Torres","Parker","Collins","Edwards","Stewart","Flores","Morris","Nguyen","Murphy","Rivera","Cook","Rogers","Morgan","Peterson","Cooper","Reed","Bailey","Bell","Gomez","Kelly","Howard","Ward","Cox","Diaz","Richardson","Wood","Watson","Brooks","Bennett","Gray","James","Reyes","Cruz","Hughes","Price","Myers","Long","Foster","Sanders","Ross","Morales","Powell","Sullivan","Russell","Ortiz","Jenkins","Gutierrez","Perry","Butler","Barnes","Fisher","Henderson","Coleman","Simmons","Patterson","Jordan","Reynolds","Hamilton","Graham","Kim","Gonzales","Alexander","Ramos","Wallace","Griffin","West","Cole","Hayes","Chavez","Gibson","Bryant","Ellis","Stevens","Murray","Ford","Marshall","Owens","Mcdonald","Harrison","Ruiz","Kennedy","Wells","Alvarez","Woods","Mendoza","Castillo","Olson","Webb","Washington","Tucker","Freeman","Burns","Henry","Vasquez","Snyder","Simpson","Crawford","Jimenez","Porter","Mason","Shaw","Gordon","Wagner","Hunter","Romero","Hicks","Dixon","Hunt","Palmer","Robertson","Black","Holmes","Stone","Meyer","Boyd","Mills","Warren","Fox","Rose","Rice","Moreno","Schmidt","Patel","Ferguson","Nichols","Herrera","Medina","Ryan","Fernandez","Weaver","Daniels","Stephens","Gardner","Payne","Kelley","Dunn","Pierce","Arnold","Tran","Spencer","Peters","Hawkins","Grant","Hansen","Castro","Hoffman","Hart","Elliott","Cunningham","Knight","Bradley","Carroll","Hudson","Duncan","Armstrong","Berry","Andrews","Johnston","Ray","Lane","Riley","Carpenter","Perkins","Aguilar","Silva","Richards","Willis","Matthews","Chapman","Lawrence","Garza","Vargas","Watkins","Wheeler","Larson","Carlson","Harper","George","Greene","Burke","Guzman","Morrison","Munoz","Jacobs","Obrien","Lawson","Franklin","Lynch","Bishop","Carr","Salazar","Austin","Mendez","Gilbert","Jensen","Williamson","Montgomery","Harvey","Oliver","Howell","Dean","Hanson","Weber","Garrett","Sims","Burton","Fuller","Soto","Mccoy","Welch","Chen","Schultz","Walters","Reid","Fields","Walsh","Little","Fowler","Bowman","Davidson","May","Day","Schneider","Newman","Brewer","Lucas","Holland","Wong","Banks","Santos","Curtis","Pearson","Delgado","Valdez","Pena","Rios","Douglas","Sandoval","Barrett","Hopkins","Keller","Guerrero","Stanley","Bates","Alvarado","Beck","Ortega","Wade","Estrada","Contreras","Barnett","Caldwell","Santiago","Lambert","Powers","Chambers","Nunez","Craig","Leonard","Lowe","Rhodes","Byrd","Gregory","Shelton","Frazier","Becker","Maldonado","Fleming","Vega","Sutton","Cohen","Jennings","Parks","Mcdaniel","Watts","Barker","Norris","Vaughn","Vazquez","Holt","Schwartz","Steele","Benson","Neal","Dominguez","Horton","Terry","Wolfe","Hale","Lyons","Graves","Haynes","Miles","Park","Warner","Padilla","Bush","Thornton","Mccarthy","Mann","Zimmerman","Erickson","Fletcher","Mckinney","Page","Dawson","Joseph","Marquez","Reeves","Klein","Espinoza","Baldwin","Moran","Love","Robbins","Higgins","Ball","Cortez","Le","Griffith","Bowen","Sharp","Cummings","Ramsey","Hardy","Swanson","Barber","Acosta","Luna","Chandler","Blair","Daniel","Cross","Simon","Dennis","Oconnor","Quinn","Gross","Navarro","Moss","Fitzgerald","Doyle","Mclaughlin","Rojas","Rodgers","Stevenson","Singh","Yang","Figueroa","Harmon","Newton","Paul","Manning","Garner","Mcgee","Reese","Francis","Burgess","Adkins","Goodman","Curry","Brady","Christensen","Potter","Walton","Goodwin","Mullins","Molina","Webster","Fischer","Campos","Avila","Sherman","Todd","Chang","Blake","Malone","Wolf","Hodges","Juarez","Gill","Farmer","Hines","Gallagher","Duran","Hubbard","Cannon","Miranda","Wang","Saunders","Tate","Mack","Hammond","Carrillo","Townsend","Wise","Ingram","Barton","Mejia","Ayala","Schroeder","Hampton","Rowe","Parsons","Frank","Waters","Strickland","Osborne","Maxwell","Chan","Deleon","Norman","Harrington","Casey","Patton","Logan","Bowers","Mueller","Glover","Floyd","Hartman","Buchanan","Cobb","French","Kramer","Mccormick","Clarke","Tyler","Gibbs","Moody","Conner","Sparks","Mcguire","Leon","Bauer","Norton","Pope","Flynn","Hogan","Robles","Salinas","Yates","Lindsey","Lloyd","Marsh","Mcbride","Owen","Solis","Pham","Lang","Pratt","Lara","Brock","Ballard","Trujillo","Shaffer","Drake","Roman","Aguirre","Morton","Stokes","Lamb","Pacheco","Patrick","Cochran","Shepherd","Cain","Burnett","Hess","Li","Cervantes","Olsen","Briggs","Ochoa","Cabrera","Velasquez","Montoya","Roth","Meyers","Cardenas","Fuentes","Weiss","Hoover","Wilkins","Nicholson","Underwood","Short","Carson","Morrow","Colon","Holloway","Summers","Bryan","Petersen"];
        break;
    }

    return { data: names };
}

function pickRandom(list) {
    return list[Math.floor(Math.random() * list.length)];
}

function generateName(gender) {
    // Fetch the names
    const firstNames = fetchNames(gender || pickRandom(['male', 'female']));
    const lastNames = fetchNames('surnames');

    // Pick a random name from each list
    const firstName = pickRandom(firstNames.data);
    const lastName = pickRandom(lastNames.data) + " " + pickRandom(lastNames.data);

    // Use a template literal to format the full name
    return `${firstName} ${lastName}`;
}

function checkNum(element) {

    if (element.value < 1000000) {
        element.value = 1000000;
    }

    if (element.value > 9999999) {
        element.value = 9999999;
    }
}

function checkDuplicated() {
    var allOfThem = [];

    for(var i = 0; i < count; i++) {
        var thisInput = document.getElementById('enrollment'+i);

        allOfThem.push(thisInput.value);
    }

    let findDuplicates = arr => arr.filter((item, index) => arr.indexOf(item) != index)
    var duplicated = findDuplicates(allOfThem);

    if(duplicated.length > 0) {
        document.getElementById("duplicatedAlert").removeAttribute("hidden");
    } else {
        document.getElementById("duplicatedAlert").setAttribute("hidden","");
        document.getElementById("regGuest").click();
    }
}


function setDynamicInputs(){

    count = 1;

    document.getElementById("dynamicInputs").innerHTML = '';

    for(let i = 0; i < $("#membersCmb").val()-1; i++){
        document.getElementById("dynamicInputs").innerHTML +=
        '<div class="d-flex justify-content-center flex-wrap">' +
            '<div class="col-12 col-md-2 my-2 mx-3 mx-xl-5">' +
                '<div class="form-floating">' +
                    '<input required onchange="checkNum(this)" type="number" min=1000000 max=9999999 class="form-control" name="enrollment'+count+'" id="enrollment'+count+'" placeholder="Matricula" value="" required>' +
                    '<label for="enrollment'+count+'">Matricula</label>' +
                '</div>' +
            '</div>'+
            '<div class="col-12 col-md-7 col-lg-6 col-xl-4 my-2 mx-3 mx-xl-5">' +
                '<div class="form-floating">'+
                    '<input required type="text" class="form-control" name="name'+count+'" id="name'+count+'"placeholder="Nombre completo" onkeyup="this.value = this.value.toUpperCase()">'+
                    '<label for="name'+count+'">Nombre completo</label>'+
                '</div>'+
            '</div>'+
        '</div>';

        count++;

    }

    document.getElementById("inputCount").value=count;

}

function updateInput(){
    $("#semester").val($("#semesterCmb").val());
    $("#UA").val( $("#UACmb :selected").text());
}
