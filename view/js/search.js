// const userCardTemplate = document.querySelector("[data-user-template]");
// const userCardContainer = document.querySelector("[data-user-cards-container]");
// const searchInput = document.querySelector("[data-search]");

// let users = [];

// searchInput.addEventListener("input", (e) => {
//   const value = e.target.value.toLowerCase();
//   users.forEach((user) => {
//     const isVisible =
//       user.name.toLowerCase().includes(value) ||
//       user.email.toLowerCase().includes(value);
//     user.element.classList.toggle("hide", !isVisible);
//   });
// });

// fetch("https://jsonplaceholder..com/users")
//   .then((res) => res.json())
//   .then((data) => {
//     users = data.map((user) => {
//       const card = userCardTemplate.content.cloneNode(true).children[0];
//       const header = card.querySelector("[data-header]");
//       const body = card.querySelector("[data-body]");
//       header.textContent = user.name;
//       body.textContent = user.email;
//       userCardContainer.append(card);
//       return { name: user.name, email: user.email, element: card };
//     });
//   });


function searchA(ev) {
  let all_tasks = document.querySelectorAll(".taskstodo");
  let ab = ev.target.parentElement.querySelector("input").value;
  console.log(ab);
  if (ab.length == 0) {
    for (let i = 0; i < all_tasks.length; i++) {
      // console.log(all_tasks);
      all_tasks[i].style.display = "";
    }
    return;
  } else {
    for (let i = 0; i < all_tasks.length; i++) {
      let titre = all_tasks[i].querySelector(".title").innerHTML;
      console.log(titre);
      let bc = 0;
      let j = 0;
      while (j < ab.length) {
        console.log(titre[j]);
        console.log(ab[j]);
        if (titre[j] != ab[j]) {
          all_tasks[i].style.display = "none";
          bc = 1;
        } else {
          all_tasks[i].style.display = "";
        }
        if (bc == 1) {
          j = titre.length;
        }
        j++;
      }
    }
  }
  // for(let i=0 ; i<all_tasks.length ; i++){
  //     console.log(all_tasks);
  // }
  // console.log(ev.target);
}