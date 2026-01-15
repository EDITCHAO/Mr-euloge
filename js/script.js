/* -------------------------- typing text animation script -------------------------- */
var typed = new Typed(".typing",{
    strings :["DÉVELOPPEUR FULL-STACK","Web Designer","Graphic Designer","Analyste de donneés","Administrateur, système et réseau"],
    typeSpeed:100,
    backSpeed:60,
    loop:true
}) 
/* -------------------------- Aside -------------------------- */
const nav = document.querySelector(".nav"),
      navList = nav.querySelectorAll("li"),
      totalNavList = navList.length,
      allSection = document.querySelectorAll(".section"),
      totalSection = allSection.length,
      navToggler = document.querySelector(".nav-toggler"),
      aside = document.querySelector(".aside");

for(let i=0; i<totalNavList; i++)
{
   const a = navList[i].querySelector("a");
   a.addEventListener("click", function()
   {
      // Remove active from all nav links
      navList.forEach(li => {
          li.querySelector("a").classList.remove("active");
      });
      this.classList.add("active");
      // Show the section and add it on top of previous sections
      const targetId = this.getAttribute("href").split("#")[1];
      const targetSection = document.getElementById(targetId);
      targetSection.classList.add("active");
      targetSection.classList.remove("back-section");
      // Increase z-index to stack on top infinitely by cycling z-index values
      let maxZ = 2;
      allSection.forEach(section => {
          const z = parseInt(section.style.zIndex) || 2;
          if(z > maxZ) maxZ = z;
      });
      // Reset z-index if it grows too large to avoid overflow
      if(maxZ > 1000) {
          allSection.forEach(section => {
              section.style.zIndex = 2;
          });
          maxZ = 2;
      }
      targetSection.style.zIndex = maxZ + 1;
   })
}

function showSection(element)
{
  const targetId = element.getAttribute("href").split("#")[1];
  const targetSection = document.getElementById(targetId);
  targetSection.classList.add("active");
  targetSection.classList.remove("back-section");
  // Set higher z-index for overlay effect
  const currentZ = parseInt(targetSection.style.zIndex) || 2;
  targetSection.style.zIndex = currentZ + 1;
}

// Toggle aside visibility
navToggler.addEventListener("click", () => {
    aside.classList.toggle("open");
});

/* -------------------------- Hire Me Button -------------------------- */
const hireMeBtn = document.querySelector(".Hire-me");
hireMeBtn.addEventListener("click", function(e) {
    e.preventDefault();
    // Remove active from all nav links
    navList.forEach(li => {
        li.querySelector("a").classList.remove("active");
    });
    // Add active to contact link
    const contactLink = document.querySelector('a[href="#contact"]');
    contactLink.classList.add("active");
    // Show the contact section
    showSection(contactLink);
});

/* -------------------------- Even My Company Button -------------------------- */
const evenMyCompanyBtn = document.querySelector('a[href="#service"].btn');
evenMyCompanyBtn.addEventListener("click", function(e) {
    e.preventDefault();
    // Remove active from all nav links
    navList.forEach(li => {
        li.querySelector("a").classList.remove("active");
    });
    // Add active to service link
    const serviceLink = document.querySelector('a[href="#service"]');
    serviceLink.classList.add("active");
    // Show the service section
    showSection(serviceLink);
});
