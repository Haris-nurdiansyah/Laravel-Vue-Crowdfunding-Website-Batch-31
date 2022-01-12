
// Soal 1

space("Soal 1");

var daftarHewan = ["2. Komodo", "5. Buaya", "3. Cicak", "4. Ular", "1. Tokek"];

daftarHewan.sort();

daftarHewan.forEach(function (e) {
    console.log(e); 
});

// Soal 2

space("Soal 2");

function introduce(data) {
    return "Nama saya " + data.name + ", umur saya " + data.age + ", alamat saya di " + data.address + ", dan saya punya hobby yaitu " + data.hobby;
}

var data = {name : "John" , age : 30 , address : "Jalan Pelesiran" , hobby : "Gaming" }
 
var perkenalan = introduce(data);
console.log(perkenalan);

// Soal 3

space("Soal 3");

function hitung_huruf_vokal(kalimat) {

    var kalimat = kalimat.toLowerCase();
    var arrayKalimat = kalimat.split("");
    var huruf_vokal = ['a', 'i', 'e', 'o', 'u'];

    var count = 0;
    huruf_vokal.forEach(huruf_vokal => {
        arrayKalimat.forEach(e => {
            e === huruf_vokal ? count +=1 : '';
        });
    });

    return count;
}

var hitung_1 = hitung_huruf_vokal("Haris")

var hitung_2 = hitung_huruf_vokal("Nurdiansyah")

console.log(hitung_1, hitung_2);

// soal 4

space("Soal 4");

function hitung(angka) {
    return angka * 2 - 2;
}

console.log( hitung(0) ) // -2
console.log( hitung(1) ) // 0
console.log( hitung(2) ) // 2
console.log( hitung(3) ) // 4
console.log( hitung(5) ) // 8


function space(title) {
    console.log(`-----------${title}---------`);
}
