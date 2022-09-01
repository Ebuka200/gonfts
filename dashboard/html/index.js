const data = null;

const xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
	if (this.readyState === this.DONE) {
		console.log(this.responseText);
	}
});

xhr.open("GET", "https://coingecko.p.rapidapi.com/exchanges/binance");
xhr.setRequestHeader("X-RapidAPI-Key", "57698dbdfbmsh78df30861b80c8bp1ee6ccjsn31e5e9fe62f2");
xhr.setRequestHeader("X-RapidAPI-Host", "coingecko.p.rapidapi.com");

xhr.send(data);