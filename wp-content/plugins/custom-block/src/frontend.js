import React, {useState} from 'react'
import ReactDOM from 'react-dom'
import "./frontend.scss"

const divToUpdate = document.querySelectorAll(".paying-attention-update-me")

divToUpdate.forEach(function(div){
  const data = JSON.parse(div.querySelector("pre").innerHTML)
  ReactDOM.render(<Quiz {...data}/>, div)
  div.classList.remove("paying-attention-update-me")
})

function Quiz(props) {
  const [isCorrect, setIsCorrect] = useState(undefined)

  function handleAnswer(index) {
    if(index == props.correctAnswer) {
      setIsCorrect(true)
    } else {
      setIsCorrect(false)
    }
  }
  
  return (
    <div className="paying-attention-frontend">
      <p>{props.question}</p>
      <ul>
        {props.answers.map(function(answer, index){
          return <li onClick={() => handleAnswer(index)}>{answer}</li>
        })}
      </ul>
      <div className={"correct-message"+ (isCorrect == true ? " correct-message--visible" : "")}>
        <p>That is correct!</p>
      </div>

      <div className={"incorrect-message" + (isCorrect === false ? " incorrect-message--visible" : "")}>
        <p>Sorry, try again!</p>
      </div>
    </div>
  )
}