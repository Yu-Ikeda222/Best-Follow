const Twitter = require('twitter-v2');
var cors = require('cors')




function client() {
  const client= new Twitter({
    consumer_key: process.env.MIX_TWITTER_CLIENT_KEY,
    consumer_secret: process.env.MIX_TWITTER_CLIENT_SECRET,
    access_token_key: process.env.MIX_TWITTER_CLIENT_ID_ACCESS_TOKEN,
    access_token_secret: process.env.MIX_TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET
    ,
  });
  return client;
}


const app = client(cors)

async function fetch_tweets() {
  return await app.get('tweets', {ids: '1228393702244134912' });
}
fetch_tweets().then((data) => {console.log(data)});

