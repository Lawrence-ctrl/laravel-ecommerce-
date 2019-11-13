import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCoffee } from '@fortawesome/free-solid-svg-icons';
import Axios from 'axios';
export default class Likes extends Component {
    constructor(props) {
        super(props);
        this.state = {
            dataLikes: props.like
        }
        this.onClick = this.onClick.bind(this);
    }

    onClick(){
        const likes = {
            likes: parseInt(this.state.dataLikes) + 1,
        }
        axios.patch('http://127.0.0.1:8000/api/details/'+this.props.productid, likes)
        .then(res =>{
            this.setState({
                dataLikes: parseInt(this.state.dataLikes) + 1,
            })
        })
       .catch(error=> {
           console.log(error)
       })
    }
  
    render() {
        return (
            <div>
                <FontAwesomeIcon icon={faCoffee} onClick={this.onClick}/>
                {this.state.dataLikes}
            </div>
        )
    }
}
const element = document.querySelectorAll('.likes');
if(element.length > 0){
    element.forEach(elements => {
        const like=elements.getAttribute('data-likes');
        const productid=elements.getAttribute('data-id');
        ReactDOM.render(<Likes like={like} productid={productid} />,elements);
    })
}
