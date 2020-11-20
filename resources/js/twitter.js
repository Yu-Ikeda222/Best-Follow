var Twitter = require('twitter');





const client = new Twitter({
  consumer_key: process.env.MIX_TWITTER_CLIENT_KEY,
  consumer_secret: process.env.MIX_TWITTER_CLIENT_SECRET,
  access_token_key: process.env.MIX_TWITTER_CLIENT_ID_ACCESS_TOKEN,
  access_token_secret: process.env.MIX_TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET
  ,
});

// async function fetch_tweets() {
//   return await client.get('tweets', {ids: '1228393702244134912' });
// }
// fetch_tweets().then((data) => {console.log(data)});

// var params = {screen_name: 'nodejs'};
// client.get('statuses/user_timeline', params, function(error, tweets, response) {
//   if (!error) {
//     console.log(tweets);
//   }
// });