const imgs = Array.from(document.querySelectorAll('.container-escape .cliquable'));
const coffre = document.querySelector('.coffre');
const escapeGame = document.querySelector('.container-escape');
const timerText = document.querySelector('.timer-text');
const timerBtn = document.querySelector('.timer button');
let temps = 0;

start();

timerBtn.addEventListener("click", () => {
  timerBtn.toggleAttribute('value');
  pauseCliqué();
});

coffre.addEventListener("click", coffreCliqué);

imgs.forEach((img) => {
  img.addEventListener("click", () => {
    // console.log(img.id)
    imgCliquée(img.id);
  });
});

function timer(){
  if (timerBtn.hasAttribute("value")) return;
  timerText.innerText = `Temps : ${temps}`;
  temps++;
}

function closeStart(){
  let startClicked = document.querySelector('.start');
  escapeGame.removeChild(startClicked);
}

function closePaused(){
  let pausedClicked = document.querySelector('.pause');
  escapeGame.removeChild(pausedClicked);
}

function closeIndice(){
  // console.log('close');
  let indiceActif = document.querySelector('.indice');
  escapeGame.removeChild(indiceActif);
}

function start(){
  // div
  const overlayEscapeStart = document.createElement('div');
  overlayEscapeStart.classList.add('overlay-escape', 'start');
  // div > div
  const startOverlay = document.createElement('div');
  startOverlay.classList.add('start-overlay');
  // h3 > div > div
  const startTitle = document.createElement('h3');
  startTitle.innerText = "Démarrez l'escape game";
  // button > div > div
  const startBtn = document.createElement('button');
  startBtn.setAttribute('type', 'submit');
  startBtn.innerText = "Start";
  startBtn.addEventListener("click", () => {
    setInterval(timer, 1000);
    closeStart();
  });
  // mise en forme
  startOverlay.appendChild(startTitle);
  startOverlay.appendChild(startBtn);
  overlayEscapeStart.appendChild(startOverlay);
  escapeGame.appendChild(overlayEscapeStart);
}

function pauseCliqué(){
  // div
  const overlayEscapePaused = document.createElement('div');
  overlayEscapePaused.classList.add('overlay-escape', 'pause');
  // div > div
  const pausedOverlay = document.createElement('div');
  pausedOverlay.classList.add('start-overlay');
  // h3 > div > div
  const pausedTitle = document.createElement('h3');
  pausedTitle.innerText = "Reprendre l'escape game";
  // button > div > div
  const pausedBtn = document.createElement('button');
  pausedBtn.setAttribute('type', 'submit');
  pausedBtn.innerText = "Reprendre";
  pausedBtn.addEventListener("click", () => {
    timerBtn.toggleAttribute('value');
    closePaused();
  });
  // mise en forme
  pausedOverlay.appendChild(pausedTitle);
  pausedOverlay.appendChild(pausedBtn);
  overlayEscapePaused.appendChild(pausedOverlay);
  escapeGame.appendChild(overlayEscapePaused);
}

function coffreCliqué(){
  // div
  const overlayEscapeCoffre = document.createElement('div');
  overlayEscapeCoffre.classList.add('overlay-escape', 'indice');
  // div > div
  const coffreOverlay = document.createElement('div');
  coffreOverlay.classList.add('coffre-overlay');
  // h3 > div > div
  const coffreTitle = document.createElement('h3');
  coffreTitle.innerText = "déverrouillez le coffre";
  // form > div > div
  const coffreForm = document.createElement('form');
  coffreForm.classList.add('cadenas');
  coffreForm.setAttribute('method', 'post');
  coffreForm.setAttribute('action', 'escape.php');
  // div > div > div
  const escapeClose = document.createElement('div');
  escapeClose.classList.add('escape-close');
  escapeClose.addEventListener("click", closeIndice);
  // i > div > div > div
  const escapeCloseIcon = document.createElement('i');
  escapeCloseIcon.classList.add('fa-solid', 'fa-xmark');
  // div > form > div > div
  const cadenasInput = document.createElement('div');
  cadenasInput.classList.add('cadenas-input');
  // input > div > form > div > div
  const input1 = document.createElement('input');
  input1.setAttribute('type', 'tel');
  input1.setAttribute('autocomplete', 'off');
  input1.setAttribute('maxlength', '1');
  input1.setAttribute('id', 'input1');
  input1.setAttribute('name', 'input1');
  input1.setAttribute('required', "");
  // input > div > form > div > div
  const input2 = document.createElement('input');
  input2.setAttribute('type', 'tel');
  input2.setAttribute('autocomplete', 'off');
  input2.setAttribute('maxlength', '1');
  input2.setAttribute('id', 'input2');
  input2.setAttribute('name', 'input2');
  input2.setAttribute('required', "");
  // input > div > form > div > div
  const input3 = document.createElement('input');
  input3.setAttribute('type', 'tel');
  input3.setAttribute('autocomplete', 'off');
  input3.setAttribute('maxlength', '1');
  input3.setAttribute('id', 'input3');
  input3.setAttribute('name', 'input3');
  input3.setAttribute('required', "");
  // input > div > form > div > div
  const inputHidden = document.createElement('input');
  inputHidden.setAttribute('type', 'hidden');
  inputHidden.setAttribute('name', 'temps');
  inputHidden.setAttribute('id', 'input-hidden');
  inputHidden.setAttribute('value', temps);
  // button > form > div > div
  const cadenasBtn = document.createElement('button');
  cadenasBtn.setAttribute('type', 'submit');
  cadenasBtn.innerText = "Ouvrir";
  // mise en forme
  cadenasInput.appendChild(input1);
  cadenasInput.appendChild(input2);
  cadenasInput.appendChild(input3);
  cadenasInput.appendChild(inputHidden);
  coffreForm.appendChild(cadenasInput);
  coffreForm.appendChild(cadenasBtn);
  escapeClose.appendChild(escapeCloseIcon);
  coffreOverlay.appendChild(coffreTitle);
  coffreOverlay.appendChild(coffreForm);
  coffreOverlay.appendChild(escapeClose);
  overlayEscapeCoffre.appendChild(coffreOverlay);
  escapeGame.appendChild(overlayEscapeCoffre);
}

function imgCliquée(id){
  // console.log(id);
  switch(id){
    case 'lahaut':{
      var titre = "là-haut";
      var texte = "Il s'agit de la maison de Carl Fredricksen, un petit papy qui a perdu sa compagne et qui rêve depuis son plus jeune âge d'un explorateur. Il équipe donc sa maison de milliers de ballons pour s'envoler avec elle.";
      var img = id;
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'tapis':{
      var titre = "aladdin";
      var texte = "C’est le tapis qu’Aladdin a trouvé dans la caverne secrète lorsqu’il devait récupérer la lampe magique qui renferme un génie qui peut exhausser trois voeux. Ce tapis est magique et lui permet de voler.";
      var img = id;
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'affiche':{
      var titre = "robin des bois";
      var texte = "Robin des bois est un voleur qui vole aux riches pour donner aux pauvres. Pour ces délits, il est recherché par le shérif de Nottingham qui placarde des affiches recherchant Robin des bois en échange de récompenses.";
      var img = id;
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'tasse':{
      var titre = "la belle et la bête";
      var texte = "Après la malédiction d’une vielle mendiante le prince devint une bête monstrueuse et les occupants se transformèrent en mobilier de maison. C’est ainsi qu’on retrouve Zip, une petite tasse de thé ébréchée.";
      var img = id;
      var color = '#b254bb';
      var border = '#87308f';
      var num = "3";
      break;
    }
    case 'dessin':{
      var titre = "le roi lion";
      var texte = "Au début du Roi Lion, le singe Rafiki, présente Simba, le seul héritier du roi, à tous les animaux. Le soir, il dessine son portrait de jeune lionceau sur l’arbre dans lequel il vit.";
      var img = id;
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'lampe':{
      var titre = "pixar";
      var texte = "Le studio d’animation PIXAR, est au départ indépendant. Il collabore ensuite avec Walt Disney Pictures pour quelques longs métrages d’animation. Il est finalement racheté en 2006 par le groupe Disney. Le studio garde sa marque de fabrique, une animation d’une lampe de bureau qui écrase la lettre i du mot « PIXAR ».";
      var img = "lampeOff";
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'aquarium':{
      var titre = "le monde de nemo";
      var texte = "Némo, après s’être fait capturé dans l’océan, atterrit dans un aquarium chez le plongeur, dentiste de profession. Il rencontre les autres poissons de l’aquarium, qui vont l’aider à se sauver afin de retrouver son père Marin.";
      var img = id;
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'olaf':{
      var titre = "la reine des neiges";
      var texte = "Olaf est un bonhomme de neige drôle enfantin. Il incarne l’innocence que l'on retrouve par exemple dans le fait qu'il veuille à tout prix découvrir la chaleur et l’été alors que celle-ci le ferait fondre, et le réduirait donc à une flaque d’eau avec un carotte.";
      var img = id;
      var color = '#de8440';
      var border = '#b35612';
      var num = "6";
      break;
    }
    case 'montre':{
      var titre = "alice aux pays des merveilles";
      var texte = "Alice est à la poursuite d’un Lapin blanc qui semble pressé par le temps et qui regarde sa montre à gousset pour vérifier qu’il n’est pas en retard. Les aiguilles de la montre sont en forme de coeur, en référence à la méchante Reine de Coeur pour laquelle travaille le lapin.";
      var img = id;
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'winnie':{
      var titre = "winnie l'ourson";
      var texte = "Le personnage de Winnie, est un ourson en peluche qui appartient à Christopher. C’est un petit garçon qui s’invente des histoires en jouant avec ses peluches. Ainsi, Winnie et ses amis vivent des aventures farfelues dans la forêt des rêves bleus.";
      var img = id;
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'porte':{
      var titre = "monstre & cie";
      var texte = "Dans Monstre & Cie, une usine de traitements de cris d'enfants fournie l’énergie nécessaire à la ville. Cette usine contient des milliers de portes qui donnent accès directement aux chambres des enfants. L’une d’entre elle est blanche et fleurie. Elle appartient à une petite fille nommée Bouh qui n’a pas peur des monstres.";
      var img = id;
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'livres':{
      var titre = "cendrillon";
      var texte = "Dans le but de participer au grand bal du roi pour se présenter au prince, toutes les jeunes filles à marier sont conviées au palais. Cendrillon souhaite retoucher une robe ayant jadis appartenu à sa vraie mère défunte. Cendrillon prépare alors sa belle robe rose grâce à son livre de couture.";
      var img = id;
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
    case 'cadre':{
      var titre = "raiponce";
      var texte = "Pascal est un caméléon. C’est l’animal de compagnie de Raiponce qui vit seule avec sa mère, isolée dans une tour au fond de la forêt. Cet animal est le meilleur ami et confident de la princesse. Il se tient généralement sur l’épaule de celle-ci.";
      var img = id;
      var color = '#7ebd66';
      var border = '#4b9430';
      var num = "2";
      break;
    }
    default:{
      var titre = "erreur";
      var texte = "Une erreur s'est produite. Veuillez réessayer.";
      var img = "erreur";
      var color = '#386b97';
      var border = '#25547c';
      var num = "";
      break;
    }
  }
  // div
  const overlayEscape = document.createElement('div');
  overlayEscape.classList.add('overlay-escape', 'indice');
  overlayEscape.addEventListener("click", closeIndice);
  // div > div
  const containerOverlay = document.createElement('div');
  containerOverlay.classList.add('container-overlay');
  containerOverlay.style.background = color;
  containerOverlay.style.border = `10px solid ${border}`;
  // img > div > div
  const overlayImg = document.createElement('img');
  overlayImg.setAttribute('src', `elements/${img}.png`);
  overlayImg.classList.add('overlay-img');
  // div > div > div
  const overlayText = document.createElement('div');
  overlayText.classList.add('overlay-text');
  // h3 > div > div > div
  const overlayTitle = document.createElement('h3');
  overlayTitle.innerText = titre;
  // p > div > div > div
  const overlayIndiceText = document.createElement('p');
  overlayIndiceText.innerText = texte;
  // div > div > div
  const escapeClose = document.createElement('div');
  escapeClose.classList.add('escape-close');
  // i > div > div > div > div
  const escapeCloseIcon = document.createElement('i');
  escapeCloseIcon.classList.add('fa-solid', 'fa-xmark');
  // p > div > div
  const overlayIndiceNum = document.createElement('p');
  overlayIndiceNum.classList.add('overlay-indice');
  overlayIndiceNum.innerText = num;
  overlayIndiceNum.style.color = border;
  // mise en forme
  overlayText.appendChild(overlayTitle);
  overlayText.appendChild(overlayIndiceText);
  escapeClose.appendChild(escapeCloseIcon);
  containerOverlay.appendChild(overlayIndiceNum);
  containerOverlay.appendChild(overlayImg);
  containerOverlay.appendChild(overlayText);
  containerOverlay.appendChild(escapeClose);
  overlayEscape.appendChild(containerOverlay);
  escapeGame.appendChild(overlayEscape);
}