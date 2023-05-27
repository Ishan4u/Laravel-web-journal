import './bootstrap';
import Search from './live-search';
import Chat from './chat'; // STEP 2

if(document.querySelector(".header-search-icon")) {
    new Search();
}

//STEP 4
if(document.querySelector(".header-chat-icon")) {
    new Chat();
}
