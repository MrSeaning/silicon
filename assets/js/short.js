// Demo
// class BtnDown extends HTMLElement {
//     constructor() {
//         // Always call super first in constructor
//         super();
//         this.innerHTML = `
//         <a class="btn btn-info btn-icon" target="_blank" href="${this.getAttribute('url')}">
//             <i class='bx bx-download' ></i>
//         </a>
//         `;

//     }
// }

// Define the new element Accordion
//customElements.define('btn-down', BtnDown);

class Accordion extends HTMLElement {
  constructor() {
    super();
    //let _innerHTML = _temp.innerHTML.trim().replace(/^(<br>)|(<br>)$/g, '');
    let content = '';
    this.innerHTML.replace(/{accordion-item id="([\s\S]*?)" title="([\s\S]*?)"}([\s\S]*?){\/accordion-item}/g, function ($0, $1, $2, $3) {
      content += `
            <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
            <h4 class="accordion-header" id="heading-${$1}">
              <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${$1}" aria-expanded="true" aria-controls="collapse-${$1}">${$2}</button>
            </h4>
            <div class="accordion-collapse collapse" id="collapse-${$1}" aria-labelledby="heading-${$1}" data-bs-parent="#accordionAlt">
              <div class="accordion-body pt-0">${$3.trim().replace(/^(<br>)|(<br>)$/g, '')}</div>
            </div>
          </div>
        `;
    });
    let htmlStr = `<div class="accordion" id="accordionAlt">${content}</div>`;
    this.innerHTML = htmlStr;
  }
}
customElements.define('sean-accordion', Accordion);

class Music extends HTMLElement {
  constructor() {
    super();
    let url = this.getAttribute("url");
    let htmlStr = `
    <div class="card mb-4 mb-lg-5">
      <div class="audio-player card-body p-sm-4">
        
        <!-- Audio tag with the link to the audio file -->
        <audio  src="${url}" preload="auto"></audio>
    
        <!-- Custom player markup -->
        <button type="button" class="ap-play-button btn btn-icon btn-primary shadow-primary"></button>
        <span class="ap-current-time flex-shr fw-medium mx-3 mx-lg-4">0:00</span>
        <input type="range" class="ap-seek-slider" max="100" value="0">
        <span class="ap-duration flex-shr fw-medium mx-3 mx-lg-4">0:00</span>
        <div class="dropup">
          <button type="button" class="ap-volume-button btn btn-icon btn-secondary" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-volume-full"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-dark my-1">
            <input type="range" class="ap-volume-slider" max="100" value="100">
          </div>
        </div>
        <a href="${url}" download="audio-sample" class="btn btn-icon btn-secondary ms-2">
          <i class="bx bx-download"></i>
        </a>
      </div>
    </div>`;
    this.innerHTML = htmlStr;
  }
}
customElements.define('sean-music', Music);