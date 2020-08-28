import React from 'react'
import ReactDOM from 'react-dom'
import { BASE_URL } from '../src/util/constants'


const FooBarForm = () => {

    const playerCount = React.useRef();
  
    const handleSubmit = () => {
        fetch(BASE_URL+'/welcome/distribute/'+playerCount.current.value)
            .then(response => response.json())
            .then((data)=> {
                if(data.status == 1) alert(data.message);
                else {
                    const Foo = () => {
                        return data.players.map((item, index) => {
                            return (
                                <div key={index}><b>{ item.name }</b> : {item.cards.join()}</div>
                            );
                        });
                    };
                    ReactDOM.render(<Foo />, document.getElementById('div_result'));
                }
            })
    };
  
    return (
      <>
        <label>Number of player </label>
        <input ref={playerCount} />
        <button onClick={handleSubmit}>Submit</button>
      </>
    );
  };



  ReactDOM.render(<FooBarForm />, document.getElementById('div_input'));
  
  
