import axios from "axios";
class Search {
    // 1. describe and create/initiate our object
    constructor() {
        this.resultDiv = document.querySelector("#search-overlay__results");
        this.openButton = document.querySelector(".js-search-trigger");
        this.closeButton = document.querySelector(".search-overlay__close");
        this.searchOverlay = document.querySelector(".search-overlay");
        this.isOverlayOpen = false;
        this.searchField = document.querySelector("#search-term");
        //Lấy khung hiển thị kết quả
        this.isSpinnerVisible = false;
        this.previousValue = '';
        this.timing;
        this.events();
    }
    // 2. events
    events() {
        if (this.openButton) {
            this.openButton.addEventListener("click", e => {
                e.preventDefault();
                this.openOverlay();
            });
        }

        this.closeButton.addEventListener("click", () => this.closeOverlay())
        document.addEventListener("keydown", e => this.keyPressDispatcher(e))
        this.searchField.addEventListener("keyup", () => this.typingLogic())
    }
    //3. method (function, action)
    //Typing Logic
    typingLogic() {
        if (this.searchField.value != this.previousValue) {
            clearTimeout(this.timing);

            if (this.searchField.value) {
                if (!this.isSpinnerVisible) {
                    this.resultDiv.innerHTML = `<div class="spinner-loader"></div>`;
                    this.isSpinnerVisible = true;
                }
                //isSpinnerVisible = true
                this.timing = setTimeout(this.getResults.bind(this), 750)
            } else {
                this.resultsDiv.innerHTML = ""
                this.isSpinnerVisible = false
            }
        }
        this.previousValue = this.searchField.value;
    }


    //In kết quả khi người dùng search từ khóa
    async getResults() {
        // this.resultDiv.innerHTML = "<h1>Đây là chỗ hiển thị kết quả</h1>";
        // this.isSpinnerVisible = false;
        try {
            console.log(smartEduData.root_url);

            const response1 = await axios.get(smartEduData.root_url + "/wp-json/wp/v2/posts?search=" + this.searchField.value);
            const response2 = await axios.get(smartEduData.root_url + "/wp-json/wp/v2/pages?search=" + this.searchField.value);
            const combineResults = response1.data.concat(response2.data)
            // console.log(combineResults);
            this.resultDiv.innerHTML = (`<h2 class="search-overlay__section-title">General Infomation</h2>
            ${combineResults.length ? '<ul class="link-list min-list">' : '<p>General Infomation no match with search</p>'}
                ${combineResults.map(item => `<li><a href='${item?.link}'>${item?.title?.rendered} ${item.type == 'post' ? `by ${item?.authorName}` : ``} </a></li>`).join('')}
            ${combineResults.length ? '</ul>' : ''}
            `);
            this.isSpinnerVisible = false;

        } catch (e) {
            console.log(e);
        }
    }

    //Xử lý mở/ đóng màn che
    keyPressDispatcher(e) {
        if (e.keyCode == 83 && !this.isOverlayOpen) {
            this.openOverlay();
        }
        if (e.keyCode == 27 && this.isOverlayOpen) {
            this.closeOverlay();
        }
    }


    openOverlay() {
        this.searchOverlay.classList.add("search-overlay--active");
        document.body.classList.add('body-no-scroll')
        this.isOverlayOpen = true;
    }
    closeOverlay() {
        this.searchOverlay.classList.remove("search-overlay--active");
        document.body.classList.remove('body-no-scroll');
        this.isOverlayOpen = false;
    }

}
export default Search;