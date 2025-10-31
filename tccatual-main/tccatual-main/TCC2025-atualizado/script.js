
const slides = document.querySelector('.slides');
const slideElements = document.querySelectorAll('.slide');
const totalSlides = slideElements.length;
let index = 0;

function showNextSlide() {
  index++;
  slides.style.transition = 'transform 0.5s ease-in-out';
  const slideWidth = slideElements[0].clientWidth;
  slides.style.transform = `translateX(-${index * slideWidth}px)`;

  if (index === totalSlides - 1) {
    setTimeout(() => {
      slides.style.transition = 'none';
      index = 0;
      slides.style.transform = `translateX(0px)`;
    }, 500);
  }
}

setInterval(showNextSlide, 9000);



window.addEventListener("scroll", function () {
  const header = document.getElementById("main-header");
  if (window.scrollY > 0) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});


const receitas = [
  { img: "/img/strogonoff.jpg", alt: "strogonoff", titulo: "Strogonoff", tempo: "40 minutos" },
  { img: "/img/lasanha.jpg", alt: "lasanha", titulo: "Lasanha", tempo: "1 hora e 20 minutos" },
  { img: "/img/pudim.jpg", alt: "pudim", titulo: "Pudim", tempo: "1 hora e 30 minutos" },
  { img: "/img/frangoassado.jpg", alt: "frango  assado", titulo: "Frango Assado", tempo: "1 hora e 30 minutos" },
  { img: "/img/brigadeiro.jpg", alt: "brigadeiro", titulo: "Brigadeiro", tempo: "1 hora e 20 minutos" },
  { img: "/img/arroz.jpg", alt: "arroz", titulo: "Arroz", tempo: "30 minutos" },
  { img: "/img/tilapia.jpg", alt: "tilapia", titulo: "Tilápia", tempo: "30 minutos" }
];



const modelo = document.querySelector(".quadrados");


const container = document.querySelector("#receitas");


receitas.forEach((receita) => {
  const novoCard = modelo.cloneNode(true);

  novoCard.querySelector(".img1").src = receita.img;
  novoCard.querySelector(".img1").alt = receita.alt;
  novoCard.querySelector(".escrita").textContent = receita.titulo;
  novoCard.querySelector(".info").innerHTML = `<i class="fas fa-clock icone-relogio"></i> ${receita.tempo}`;

  container.appendChild(novoCard);

  const link = document.createElement('a');
  link.href = `#`;

  link.appendChild(novoCard);

  container.appendChild(link);
});

const toggle = document.getElementById("togglePaginas");
const pages = document.getElementById("pages");
const icone = document.getElementById("iconeSwitch");

toggle.addEventListener("change", () => {
  if (toggle.checked) {
    pages.style.transform = "translateX(-100%)";
    icone.textContent = "🧂";
  } else {
    pages.style.transform = "translateX(0%)";
    icone.textContent = "🍴"; // Página 1
  }
});

/*
const input = document.getElementById('searchInput');

input.addEventListener('input', () => {
  const termo = input.value.toLowerCase();
  const cards = document.querySelectorAll('#receitas .quadrados');

  cards.forEach(card => {
    const titulo = card.querySelector('.escrita').textContent.toLowerCase();

    if (titulo.includes(termo)) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
});*/







