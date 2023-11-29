import axios from "axios";
class Search {
    // 1. describe and create/initiate our object
    constructor() {
        this.resultDiv = document.querySelector("#search-overlay__results");
        this.openButton = document.querySelectorAll(".js-search-trigger");
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
        this.openButton.forEach(el => {
            el.addEventListener("click", e => {
                e.preventDefault()
                this.openOverlay()
            })
        })

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
            const response = await axios.get(smartEduData.root_url + "/wp-json/smartedu/v1/np-smartedu?term=" + this.searchField.value);
            const results = response?.data;
            this.resultDiv.innerHTML = (`
                <div class="row">
                    <div class="one-third">
                        <h2 class="search-overlay__section-title">General Infomation</h2>
                        ${results.general_info.length ? '<ul class="link-list min-list">' : "<p>No general information matches that search.</p>"}
                             ${results.general_info.map(item => `<li><a href='${item?.permalink}'>${item?.title} ${item.postType == 'post' ? `by ${item?.authorName}` : ``} </a></li>`).join("")}
                         ${results.general_info.length ? "</ul>" : ""}
                    </div >

                    <div class="one-third">
                        <h2 class="search-overlay__section-title">Programes</h2>
                        ${results.programmes.length ? '<ul class="link-list min-list">' : "<p>No programes matches that search.</p>"}
                             ${results.programmes.map(item => `<li><a href='${item?.permalink}'>${item?.title} ${item.postType == 'programmes' ? `by ${item?.authorName}` : ``} </a></li>`).join("")}
                         ${results.programmes.length ? "</ul>" : ""}

                        <h2 class="search-overlay__section-title">Professors</h2>
                        ${results.professors.length ? '<ul class="link-list min-list">' : "<p>No professors matches that search.</p>"}
                             ${results.professors.map(item => `
                                <li class="professor-card__list-item">
                                    <a class="professor-card" href="${item?.permalink}">
                                        <img class="professor-card__image" src="${item?.image}" alt="">
                                        <span class="professor-card__name text-left">${item?.title}</span>
                                    </a>
                                </li>`).join("")}
                         ${results.professors.length ? "</ul>" : ""}
                    </div>
                    <div class="one-third">
                        <h2 class="search-overlay__section-title">Events</h2>
                        ${results.event.length ? '<ul class="link-list min-list">' : "<p>No events matches that search.</p>"}
                             ${results.event.map(item => `
                                <div class="message-box">
                                    <h2> ${item?.title} </h2>
                                    <p>${item?.description}</p>
                                    <div class="event-date mb-2">
                                        <div class="event__month">Posted tháng
                                            <strong>${item?.month}</strong></div>
                                        <div class="event__day">&nbsp Ngày
                                            <strong>${item?.date}</strong></div>
                                    </div>
                                    <a href="${item?.permalink}" class="hover-btn-new orange"><span>Learn
                                            More</span></a>
                                </div>`).join("")}
                         ${results.event.length ? "</ul>" : ""}
                    </div>
                </div >
            `)
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