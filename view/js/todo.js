const form = document.getElementById("todo-form");
const input_text = document.getElementById("todo-input");
const input_date = document.getElementById("Deadline");
const todoLane = document.getElementById("todo-lane");

var xhttp = new XMLHttpRequest();

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const value1 = input_text.value;
  const value2 = input_date.value;

  if (!value1) return;
  if (!value2) return;

  const newTask = document.createElement("div");
  var task = document.createElement("p")
  var deadline = document.createElement("p")
  newTask.classList.add("task");
  newTask.setAttribute("draggable", "true");
  task.innerText = value1;
  deadline.innerText = value2;
  newTask.appendChild(task);
  newTask.appendChild(deadline);

  newTask.addEventListener("dragstart", () => {
    newTask.classList.add("is-dragging");
  });

  newTask.addEventListener("dragend", () => {
    newTask.classList.remove("is-dragging");
  });

  todoLane.appendChild(newTask);

  input_text.value = "";
  input_date.value = "";
  // window.location.href ="../controllers/task.php?TITLE=" + value1 + "&DEADLINE=" + value2;
  xhttp.open("GET", "../controllers/task.php?TITLE=" + value1 +"&DEADLINE=" + value2 , true);
  xhttp.send();

});
