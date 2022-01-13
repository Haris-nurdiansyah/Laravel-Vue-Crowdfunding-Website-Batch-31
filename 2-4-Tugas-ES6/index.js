// Tugas pekan 2 hari ke 4

// SOAL 1

const luas = (panjang, lebar) => {
    return panjang * lebar;
}

let keliling = (panjang, lebar) => {
    return 2 * (panjang + lebar);
}

space("SOAL 1");
console.log(luas(18, 7));
console.log(keliling(18, 7));

// SOAL2

const newFunction = (first_name, last_name) => {
    return {
        first_name,
        last_name,
        fullName: () => {
            console.log(`${first_name} ${last_name}`);
        }
    }
}

//Driver Code 
space("SOAL 2");
newFunction("William", "Imoh").fullName() 


// SOAL 3

const newObject = {
    firstName: "Muhammad",
    lastName: "Iqbal Mubarok",
    address: "Jalan Ranamanyar",
    hobby: "playing football",
}

const {firstName, lastName, address, hobby} = newObject;

space("SOAL 3");
console.log(firstName, lastName, address, hobby);

// SOAL 4

const west = ["Will", "Chris", "Sam", "Holly"];
const east = ["Gill", "Brian", "Noel", "Maggie"];
const combined = [...west, ...east];

space("SOAL 4");
console.log(combined);

// SOAL 5

const planet = "earth" 
const view = "glass" 
const after = `Lorem ${view} dolor sit amet, consectetur adipiscing elit, ${planet}`;

space("SOAL 5");
console.log(after);

function space(nama_soal) {
    console.log(`------${nama_soal}------`);
}
