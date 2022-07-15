class MyNotes {

  constructor() {
    this.myNotes = document.querySelector("#my-notes")
    this.events();
  }
  
  events() {
    if(this.myNotes){
      this.myNotes.addEventListener("click", e => this.clickHandler(e))
      document.querySelector(".submit-note").addEventListener("click", () => this.createNote())
    }
  }

  clickHandler(e) {
    if (e.target.classList.contains("delete-note") || e.target.classList.contains("fa-trash-o")) this.deleteNote(e)
    if (e.target.classList.contains("edit-note") || e.target.classList.contains("fa-pencil") || e.target.classList.contains("fa-times")) this.editNote(e)
    if (e.target.classList.contains("update-note") || e.target.classList.contains("fa-arrow-right")) this.updateNote(e)
  }

  //Methods

  async createNote() {
    const ourNewPost = {
      'title': document.querySelector(".new-note-title").value,
      'content': document.querySelector(".new-note-body").value,
      'status': 'private'

    }

    fetch(uniData.root_url+'/wp-json/wp/v2/note/', {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': uniData.nonce
      },
      body: JSON.stringify(ourNewPost)

    }).then((res) => {
      return res.json();
    }).then( (res) => {
      console.log(res)
      document.querySelector(".new-note-title").value = ""
      document.querySelector(".new-note-body").value = ""
      document.querySelector("#my-notes").insertAdjacentHTML(
        "afterbegin",
        `<li data-id="${res.id}" class="fade-in-calc">
          <input readonly class="note-title-field" value="${res.title.raw}">
          <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
          <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
          <textarea readonly class="note-body-field">${res.content.raw}</textarea>
          <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right" aria-hidden="true"></i> Save</span>
        </li>`
      )

      let finalHeight 
      let newlyCreated = document.querySelector("#my-notes li")

      setTimeout(function () {
        finalHeight = `${newlyCreated.offsetHeight}px`
        newlyCreated.style.height = "0px"
      }, 30)

      setTimeout(function () {
        newlyCreated.classList.remove("fade-in-calc")
        newlyCreated.style.height = finalHeight
      }, 50)

      setTimeout(function () {
        newlyCreated.style.removeProperty("height")
      }, 450)

    }).catch((err) => {
      document.querySelector(".note-limit-message").classList.add("active");
      console.log('Sorry');
    })
  }

  editNote(e) {
    const idNote = ((e.target).parentElement);

    if (idNote.getAttribute("data-state") == "editable") {
      this.makeNoteReadOnly(idNote)
    } else {
      this.makeNoteEditable(idNote)
    }
  }

  makeNoteEditable(thisNote) {
    thisNote.querySelector(".edit-note").innerHTML = '<i class="fa fa-times" aria-hidden="true"></i> Cancel'
    thisNote.querySelector(".note-title-field").removeAttribute("readonly")
    thisNote.querySelector(".note-body-field").removeAttribute("readonly")
    thisNote.querySelector(".note-title-field").classList.add("note-active-field")
    thisNote.querySelector(".note-body-field").classList.add("note-active-field")
    thisNote.querySelector(".update-note").classList.add("update-note--visible")
    thisNote.setAttribute("data-state", "editable")
  }

  makeNoteReadOnly(thisNote) {
    thisNote.querySelector(".edit-note").innerHTML = '<i class="fa fa-pencil" aria-hidden="true"></i> Edit'
    thisNote.querySelector(".note-title-field").setAttribute("readonly", "true")
    thisNote.querySelector(".note-body-field").setAttribute("readonly", "true")
    thisNote.querySelector(".note-title-field").classList.remove("note-active-field")
    thisNote.querySelector(".note-body-field").classList.remove("note-active-field")
    thisNote.querySelector(".update-note").classList.remove("update-note--visible")
    thisNote.setAttribute("data-state", "cancel")
  }

  updateNote(e) {
    const idNote = ((e.target).parentElement);

    const ourUpdatedPost = {
      "title": idNote.querySelector(".note-title-field").value,
      "content": idNote.querySelector(".note-body-field").value

    }

    fetch(uniData.root_url+'/wp-json/wp/v2/note/'+idNote.getAttribute("data-id"), {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': uniData.nonce
      },
      body: JSON.stringify(ourUpdatedPost)

    }).then(res => {
      if(res.ok) {
        console.log('update was successful')
        console.log(res)
        this.makeNoteReadOnly(idNote);
      }
      else {console.log('update was unsuccessful')}
      return res
      })
      .then(res => console.log(res))
  }

  deleteNote(e) {
    const idNote = ((e.target).parentElement);

    fetch(uniData.root_url+'/wp-json/wp/v2/note/'+idNote.getAttribute("data-id"), {
      credentials: 'same-origin',
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-WP-Nonce': uniData.nonce
      },

    }).then(res => {
      if(res.ok) {
        console.log('Delete was successful')
        idNote.style.height = `${idNote.offsetHeight}px`
        setTimeout(function () {
          idNote.classList.add("fade-out")
        }, 20)
        setTimeout(function () {
          idNote.remove()
        }, 401)
      }
      else {console.log('Delete was unsuccessful')}
      return res.json();
      }).then(res => {
        if(res.userNoteCount < 5) {
          document.querySelector(".note-limit-message").classList.remove("active");
        }
        console.log(res)
      })
  }
}

export default MyNotes;