const draggables = document.querySelectorAll(".task");
const droppables = document.querySelectorAll(".swim-lane");
var ID;
var stat;
var xhttp = new XMLHttpRequest();

draggables.forEach((task) => {
  task.addEventListener("dragstart", () => {
    task.classList.add("is-dragging");
    ID = task.querySelector(".ID-TASK").value;
    
  });
  task.addEventListener("dragend", () => {
    task.classList.remove("is-dragging");
  });
});

droppables.forEach((zone) => {
  zone.addEventListener("dragover", (e) => {
    e.preventDefault();

    const bottomTask = insertAboveTask(zone, e.clientY);
    const curTask = document.querySelector(".is-dragging");

    if (!bottomTask) {
      zone.appendChild(curTask);
    } else {
      zone.insertBefore(curTask, bottomTask);
    }
    
    // const ID = zone.querySelector(".ID-TASK").value;
  });
});

const insertAboveTask = (zone, mouseY) => {
  const els = zone.querySelectorAll(".task:not(.is-dragging)");

  let closestTask = null;
  let closestOffset = Number.NEGATIVE_INFINITY;

  els.forEach((task) => {
    const { top } = task.getBoundingClientRect();

    const offset = mouseY - top;

    if (offset < 0 && offset > closestOffset) {
      closestOffset = offset;
      closestTask = task;
    }
  });
  stat = zone.querySelector(".heading").innerHTML;
  xhttp.open(
    "GET",
    "../controllers/task.php?ID_TASK_STAT=" + ID + "&STAT=" + stat,
    true
  );
  xhttp.send();
  return closestTask;
};




