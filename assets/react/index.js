import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';

let el = document.getElementById('root');
if (el) {
    ReactDOM.render(
        <React.StrictMode>
            <App />
        </React.StrictMode>,
        document.getElementById('root')
    );
}

