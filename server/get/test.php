<?php

header('Content-Type: application/json');
require 'medoo.php';

$count = file_get_contents("count_com.txt");
$count = trim($count);
$count = $count + 1;
$fl = fopen("count_com.txt","w+");
fwrite($fl,$count);
fclose($fl);

$database = new medoo("botb");
$datas=$database->select("text","*",array("ORDER" => "id DESC",) );
$arr=array(
Array
(
    [0] => Array
        (
            [id] => 396
            [commentary] => End of the over. Royal 44/2
        )

    [1] => Array
        (
            [id] => 395
            [commentary] => 2 gulleys in place
        )

    [2] => Array
        (
            [id] => 394
            [commentary] => Yet another brilliant piece of bowling by Abdul Cader.
        )

    [3] => Array
        (
            [id] => 393
            [commentary] => STC clearly showing their intentions in regaining the shield they lost in the previous year.
        )

    [4] => Array
        (
            [id] => 392
            [commentary] => Brilliant piece of fielding by the Thomians. Four slips in place.
        )

    [5] => Array
        (
            [id] => 391
            [commentary] => Samarasinghe has replaced Dias at the crease.
        )

    [6] => Array
        (
            [id] => 390
            [commentary] => Another appeal yet again
        )

    [7] => Array
        (
            [id] => 389
            [commentary] => Another huge appeal by the Thomians. Not Given. Royal College under pressure.
        )

    [8] => Array
        (
            [id] => 387
            [commentary] => WICKET Shaminda Dias is taken by the wicket keeper
        )

    [9] => Array
        (
            [id] => 386
            [commentary] => Royal College Run Rate at 2.21 rpo
        )

    [10] => Array
        (
            [id] => 385
            [commentary] => Dias smashes the ball down to third man for FOUR
        )

    [11] => Array
        (
            [id] => 384
            [commentary] => End of the over for Sahan Wijesinghe
        )

    [12] => Array
        (
            [id] => 383
            [commentary] => Ramanayake and Shaminda Dias at the crease
        )

    [13] => Array
        (
            [id] => 382
            [commentary] => Thomian fielders make their way towards the grounds.
        )

    [14] => Array
        (
            [id] => 381
            [commentary] => Slight chance of showers today at around `11 am. which might be to the favour of the Royal side. Current temperature is at 27 degrees Celsius. Humidity: 61%.
        )

    [15] => Array
        (
            [id] => 380
            [commentary] => Welcome. This is the Royal College Computer Society joining you live from the SSC grounds on the FINAL DAY of the 135th Battle of the Blues. Royal College at a very critical stage here trailing by 131 runs with the loss of one wicket and one player injured.
        )

    [16] => Array
        (
            [id] => 379
            [commentary] => Day two summary - Chamika Karunarathne taking 4 wickets at the end of the STC 1st inning, Hasitha Samarasinghe had an unexpected cramp during the match and retired, and D. Panditharathne of RC was caught for a duck by Rathnayake and the ball delivered by Wijesinghe. Royal College trail by 131 runs with 9 wickets in hand.
        )

    [17] => Array
        (
            [id] => 378
            [commentary] => Crowds gather at the grounds in celebration. An amazing sight.
        )

    [18] => Array
        (
            [id] => 377
            [commentary] => Stay updated throughout the determinant FINAL DAY of the 135th Battle of the Blues with the Live Score App brought to you by the Royal College Computer Society, sponsored by the Royal College Group of 2010
        )

    [19] => Array
        (
            [id] => 376
            [commentary] => At the end of the day Royal College trail by 131 runs with 9 wickets remaining.
        )

    [20] => Array
        (
            [id] => 375
            [commentary] => Stumps day two of the 135th Battle of the Blues.
        )

    [21] => Array
        (
            [id] => 374
            [commentary] => A big appeal from the St. Thomas' College but rejected by the umpire.
        )

    [22] => Array
        (
            [id] => 373
            [commentary] => Approximately 16 overs remaining.
        )

    [23] => Array
        (
            [id] => 372
            [commentary] => End of the 16th over.
        )

    [24] => Array
        (
            [id] => 371
            [commentary] => Big appeal for the dismissal of Dias. Not given.
        )

    [25] => Array
        (
            [id] => 370
            [commentary] => The enormous flags carried around by the school Prefects is certainly an eye catcher here at the SSC. This year's Royal College flag is a 135 metres long!
        )

    [26] => Array
        (
            [id] => 369
            [commentary] => The Boy's Tents play a major role in this encounter. batsmen and fielders of both schools look toward their respective boy's tent to boost their confidence.
        )

    [27] => Array
        (
            [id] => 368
            [commentary] => The Royal Stewards leading the cheers at the RC Boy's Tent.
        )

    [28] => Array
        (
            [id] => 367
            [commentary] => FOUR. Cut away through the covers for a boundary by Dias
        )

    [29] => Array
        (
            [id] => 366
            [commentary] => End of the 11th over
        )

    [30] => Array
        (
            [id] => 365
            [commentary] => Current partnership is 28 runs in 8.5 overs, with a Run rate of 3.16 rpo
        )

    [31] => Array
        (
            [id] => 364
            [commentary] => approximately 24 overs remain till close of play
        )

    [32] => Array
        (
            [id] => 363
            [commentary] => Royal College trail by 137 runs with 9 wickets remaining and 1 injured
        )

    [33] => Array
        (
            [id] => 362
            [commentary] => Lovely shot through the covers to the boundary for FOUR by Ramanayake
        )

    [34] => Array
        (
            [id] => 361
            [commentary] => Winds in from the Southwest at 15 km/h
        )

    [35] => Array
        (
            [id] => 360
            [commentary] => Temperature drops to 31 degrees Celsius. Humidity: 56%
        )

    [36] => Array
        (
            [id] => 359
            [commentary] => Hashen Ramanayake replaces Samarasinghe
        )

    [37] => Array
        (
            [id] => 358
            [commentary] => Samarasinghe retires and is being led back to the pavillion due to injury.
        )

    [38] => Array
        (
            [id] => 357
            [commentary] => Play commences Cader balls
        )

    [39] => Array
        (
            [id] => 356
            [commentary] => It has clearly been a tiring day for the Royalists.
        )

    [40] => Array
        (
            [id] => 355
            [commentary] => Medics attend to Samarasinghe. Slight delay in play.
        )

    [41] => Array
        (
            [id] => 354
            [commentary] => Samarasinghe goes down with a cramp..
        )

    [42] => Array
        (
            [id] => 353
            [commentary] => Lovely shot by Samarsinghe smashed to the boundary for FOUR
        )

    [43] => Array
        (
            [id] => 352
            [commentary] => That's the end of the 8th over
        )

    [44] => Array
        (
            [id] => 351
            [commentary] => 7.2 Wijesinghe to Hasith Samarasinghe, FOUR
        )

    [45] => Array
        (
            [id] => 350
            [commentary] => Royal Run rate drops to 2.68 rpo
        )

    [46] => Array
        (
            [id] => 349
            [commentary] => Approximately 27 overs remaining for the day
        )

    [47] => Array
        (
            [id] => 348
            [commentary] => Maiden over by Cader
        )

    [48] => Array
        (
            [id] => 347
            [commentary] => Royal has a Run rate of 3.42 rpo
        )

    [49] => Array
        (
            [id] => 344
            [commentary] => Samarasinghe replaces Panditharathne at the crease.
        )

    [50] => Array
        (
            [id] => 343
            [commentary] => WICKET that's the end of Panditharathne.
        )

    [51] => Array
        (
            [id] => 342
            [commentary] => Royal College trail by a 166 runs.
        )

    [52] => Array
        (
            [id] => 341
            [commentary] => Royal College under pressure thanks to exceptional balling by Cader.
        )

    [53] => Array
        (
            [id] => 340
            [commentary] => RC Openers: Shaminda Dias and Geeshanth Panditharathne.Abdul Cader balling.
        )

    [54] => Array
        (
            [id] => 339
            [commentary] => There are four slips in place.
        )

    [55] => Array
        (
            [id] => 338
            [commentary] => Royal openers arrive at the crease to commence the 2nd innings.
        )

    [56] => Array
        (
            [id] => 337
            [commentary] => S.Thomas' College have declared their innings with a lead of 167 runs. Royal 2nd innings to commence shortly.
        )

    [57] => Array
        (
            [id] => 336
            [commentary] => The partnership of 116 runs played between Wickramasinghe and de Mel breaks the record for the highest partnership for the 8th wicket previously set in 1996
        )

    [58] => Array
        (
            [id] => 335
            [commentary] => A fine catch by Anupa Thilakaratne.
        )

    [59] => Array
        (
            [id] => 333
            [commentary] => FOUR more to Wickramasinghe smashed down the track towards the boundary.
        )

    [60] => Array
        (
            [id] => 332
            [commentary] => At Close of Play yesterday, Thu, 13 Mar S.Thomas' College 1st innings 134/3 (S de Mel 40, H Nanayakkara 1, 40 overs)<br/>
        )

    [61] => Array
        (
            [id] => 331
            [commentary] => S.Thomas' College 1st innings Fall of wickets 1-26 (Opatha, 5.2 ov), 2-76 (Mendis, 20.4 ov), 3-127 (Sumanasiri, 34.2 ov), 4-136 (Nanayakkara, 40.6 ov), 5-179 (Rathnayake, 58.4 ov), 6-209 (Ravichandrakumar, 66.5 ov), 7-209 (Jayathilake, 70.2 ov)
        )

    [62] => Array
        (
            [id] => 330
            [commentary] => FOUR more down the track played past point towards the boundary by Wickramasinghe
        )

    [63] => Array
        (
            [id] => 329
            [commentary] => Thomian fielders seen warming up. Signs of a declaration.
        )

    [64] => Array
        (
            [id] => 328
            [commentary] => FOUR more to the centurion S de Mel
        )

    [65] => Array
        (
            [id] => 327
            [commentary] => Well fielded by the cover fielder.
        )

    [66] => Array
        (
            [id] => 325
            [commentary] => The fist century played by a Thomian after 2009
        )

    [67] => Array
        (
            [id] => 324
            [commentary] => This is the first Century scored by Sanesh de Mel in the big match since.
        )

    [68] => Array
        (
            [id] => 323
            [commentary] => K Wickramasighe has completed his half century
        )

    [69] => Array
        (
            [id] => 322
            [commentary] => It's the CENTURY for S de Mel. A big achievement in Battle of the Blues for him.
        )

    [70] => Array
        (
            [id] => 321
            [commentary] => And that's the tea on 2nd day, STC are 292/7
        )

    [71] => Array
        (
            [id] => 320
            [commentary] => Change of balling. Devind Pathmanathan comes to ball from the People's Bank end
        )

    [72] => Array
        (
            [id] => 319
            [commentary] => And we witness the first SIX played in the 135th, Wickramasinghe hails the ball over the boundary.
        )

    [73] => Array
        (
            [id] => 317
            [commentary] => Randev to Wickramasinghe, the ball edges the bat and skipper Chamika drops the catch. Living dangerously are the STC batsmen. But very poor fielding by Royal
        )

    [74] => Array
        (
            [id] => 316
            [commentary] => de Mel scores another couple, he moves into 94
        )

    [75] => Array
        (
            [id] => 315
            [commentary] => Karunarathne to de Mel, elegant shot through the cover region. de Mel moves into nineties
        )

    [76] => Array
        (
            [id] => 314
            [commentary] => De Mel Back into the strike
        )

    [77] => Array
        (
            [id] => 313
            [commentary] => The record for the highest individual score is held by Royalist Sumithra Warnakulasuriya who scored a aggregate of 238 runs in both iinings which included 1 six and 22 fours which is also the record for the highest number of boundaries in the series.
        )

    [78] => Array
        (
            [id] => 312
            [commentary] => A no ball balled by Karunarathne, score moves to 271
        )

    [79] => Array
        (
            [id] => 311
            [commentary] => approximately 20 minutes left for tea
        )

    [80] => Array
        (
            [id] => 310
            [commentary] => Sanesh de Mel currently the highest scorer of this match is the Secretary of the side. He is a 2nd year coloursman. Left hand top order batsman and wicket keeper of the side. His previous high score was 37 runs.
        )

    [81] => Array
        (
            [id] => 309
            [commentary] => Possibility of STC declaring after Sanesh de Mel reaches his century.
        )

    [82] => Array
        (
            [id] => 308
            [commentary] => STC run rate is slowing gradually. If they want to win this match they would want to score some boundaries quickly and give the chance to Royal batsmen to feel the pressure
        )

    [83] => Array
        (
            [id] => 307
            [commentary] => Crowd gradually grows as we come closer to tea time of the 2nd day of the 135th battle of the Blues.
        )

    [84] => Array
        (
            [id] => 306
            [commentary] => Slight showers expected tomorrow morning. Has a possibility of affecting play.
        )

    [85] => Array
        (
            [id] => 305
            [commentary] => Skipper Karunarathne currently bowling.
        )

    [86] => Array
        (
            [id] => 304
            [commentary] => Sanesh de Mel beats his own high score of 32 runs with a whopping 87 runs.
        )

    [87] => Array
        (
            [id] => 303
            [commentary] => Slight Delay in play. Randev Pathirana going down due to cramps.
        )

    [88] => Array
        (
            [id] => 302
            [commentary] => Clear skies here at the SSC. Temperature is at 34 degrees Celsius. Humidity: 33%
        )

    [89] => Array
        (
            [id] => 301
            [commentary] => STC Run Rate currently at 2.85 rpo
        )

    [90] => Array
        (
            [id] => 300
            [commentary] => Approximately 50 overs more remaining for the day
        )

    [91] => Array
        (
            [id] => 299
            [commentary] => S de Mel takes a quick single and a shy at the stumps at the non-striker's end, barely misses the wicket.
        )

    [92] => Array
        (
            [id] => 298
            [commentary] => Fall of wickets 1-26 (Opatha, 5.2 ov), 2-76 (Mendis, 20.4 ov), 3-127 (Sumanasiri, 34.2 ov), 4-136 (Nanayakkara, 40.6 ov), 5-179 (Rathnayake, 58.4 ov), 6-209 (Ravichandrakumar, 66.5 ov), 7-209 (Jayathilake, 70.2 ov)
        )

    [93] => Array
        (
            [id] => 297
            [commentary] => STC gains a lead of 100 runs in the 1st innings.
        )

    [94] => Array
        (
            [id] => 296
            [commentary] => Winds in from the North at 7 km/h
        )

    [95] => Array
        (
            [id] => 295
            [commentary] => Ramanayake to Wickramasinghe, straight shot down the ground, well fielded by the Mid-on fielder
        )

    [96] => Array
        (
            [id] => 294
            [commentary] => The 38th Royal-Thomian Limited Over Encounter which is the Limited Over edition of the Big Match, for the Mustangs Trophy will be played on 22nd March 2014 at the S.S.C. Grounds.
        )

    [97] => Array
        (
            [id] => 293
            [commentary] => Bowling Change. Hashen Ramanayake bowling from commentary box end. One slip in place.
        )

    [98] => Array
        (
            [id] => 292
            [commentary] => Current temperature is 34 degrees Celsius. Humidity: 12%
        )

    [99] => Array
        (
            [id] => 290
            [commentary] => Drinks at the end of the 85th over.
        )

    [100] => Array
        (
            [id] => 289
            [commentary] => The Thomian College Anthem was first introduced in the April issue of the College Magazine in 1916. The lyrics of the College song were written by Mr. Edmund de Livera a past pupil of the Colombo Academy as Royal College was known back then. Yet another historic Royal-Thomian link.
        )

    [101] => Array
        (
            [id] => 288
            [commentary] => Thilakarathne to Wickramasinghe, straight shot into the face of the Umpire, STC scores another FOUR
        )

    [102] => Array
        (
            [id] => 287
            [commentary] => Karunarathne to S de Mel, FOUR runs again to STC
        )

    [103] => Array
        (
            [id] => 285
            [commentary] => Karunarathne to Wickramasinghe, elegant timing from the batsman. Didn't try to hit it too hard, and the ball glides through the cover region.
        )

    [104] => Array
        (
            [id] => 283
            [commentary] => Again a huge appeal for the wicket of Wickramasinghe. Not given by the umpire
        )

    [105] => Array
        (
            [id] => 282
            [commentary] => Royal skipper Karunarathne currently bowling.
        )

    [106] => Array
        (
            [id] => 281
            [commentary] => The Royal Boy's tent boasts a daily crowd of over 3500 school boys from the ages of 6 to 19.
        )

    [107] => Array
        (
            [id] => 280
            [commentary] => Huge appeal for LBW, not given by the Umpire
        )

    [108] => Array
        (
            [id] => 279
            [commentary] => Ramanayake to Wickramasinghe, nicely cut towards backward point and another FOUR runs is added to the Thomian score card
        )

    [109] => Array
        (
            [id] => 278
            [commentary] => The 96 run partnership by Harith Samarasinghe and Thiran Dhanapala is currently the highest in the match. It also holds the record for the highest partnership for the 9th wicket in this series.
        )

    [110] => Array
        (
            [id] => 277
            [commentary] => STC lead by 68 runs with 3 wickets remaining
        )

    [111] => Array
        (
            [id] => 276
            [commentary] => Huge appeal for a Catch behind wicket. Not given by the umpire.
        )

    [112] => Array
        (
            [id] => 274
            [commentary] => Notable Thomians who have played the Big Match: Don Stephen Senanayake, Dudley Senanayake, Michael Tissera, Anura Tennekoon, Bradman Weerakoon, Duleep Mendis, Guy de Alwis, Saliya Ahangama, Kaushik Amalean, Kapila Wijegunawardene, Johanne Samarasekera, Nisal Fernando, Jeewan Mendis, S. Saravanamuttu, P. Saravanamuttu, M. Saravanamuttu
        )

    [113] => Array
        (
            [id] => 273
            [commentary] => The Senanayake Shield was first presented in the year 1928. Both D.S.Senanayake and Dudley Senanayake played for St. Thomas' College side.
        )

    [114] => Array
        (
            [id] => 272
            [commentary] => Notable Royalists who have played the Big Match: J.R. Jayawardene, Sir John Lionel Kotalawela, Sir Forester Obeysekera, N.S. Joseph, R. L. de Krester, B. R. Heyn, Rajendra Coomaraswamy, B. W. Bawa, P.B. Bulankulama, Ranjan Madugalle, Gamini Goonesena, Churchill Gunasekara, Fredrick C. de Saram, Satyendra Coomaraswamy, Donald Rutnam (First Head Prefect of Royal College), Basil Gunasekara, Muhammad Ajward Macan Markar, Asantha De Mel, Sudath Pasqual, Jayantha Amerasinghe, Rohan Jayasekera, Roshan Jurangpathy, Jehan Mubarak, Pradeep Jayaprakashdaran, Kushal Janith Perera, Bhanuka Rajapaksa.
        )

    [115] => Array
        (
            [id] => 270
            [commentary] => Karunarathne to Wickramasinghe, another edge goes through the slip region for FOUR. No chance of taking the catch
        )

    [116] => Array
        (
            [id] => 269
            [commentary] => Sensible batting by both the batsmen. They're trying to lengthen the gap made by STC top order.
        )

    [117] => Array
        (
            [id] => 268
            [commentary] => FOUR flicked by Wickramasinghe towards the boundary
        )

    [118] => Array
        (
            [id] => 266
            [commentary] => This is a very crucial stage for both teams. Each team's performance will pretty much determine the outcome of this match.
        )

    [119] => Array
        (
            [id] => 265
            [commentary] => WICKET S Jayathilaka Caught behind wicket by Thiran Dhanapala. Bowler: C Karunarathne
        )

    [120] => Array
        (
            [id] => 264
            [commentary] => Chamika Karunarathne Bowling
        )

    [121] => Array
        (
            [id] => 263
            [commentary] => And we're back after the Lunch Break
        )

    [122] => Array
        (
            [id] => 261
            [commentary] => Fans young and old gather around their respective school flags and parade around the SSC grounds. The Spirit of the Royal-Thomian on display.
        )

    [123] => Array
        (
            [id] => 260
            [commentary] => Stay tuned with the Royal College Computer Society as we bring you news as it happens at the 135th Royal-Thomian battle of the Blues live from the SSC Grounds
        )

    [124] => Array
        (
            [id] => 259
            [commentary] => LUNCH S.Thomas College 209 runs with the loss of 6 wickets in 70 overs
        )

    [125] => Array
        (
            [id] => 258
            [commentary] => S.Thomas' College lead by 51 runs with 4 wickets remaining in the 1st innings
        )

    [126] => Array
        (
            [id] => 257
            [commentary] => Devind Pathmanathan bowling
        )

    [127] => Array
        (
            [id] => 256
            [commentary] => Sachitha Jayatilake, right handed batsman replaces the Thomian Skipper.
        )

    [128] => Array
        (
            [id] => 255
            [commentary] => This time Chamika takes the WICKET of Madushan. Superb catch by the fielder in backward point.
        )

    [129] => Array
        (
            [id] => 254
            [commentary] => Royal skipper to Thomian skipper, nicely driven through the covers by Madushan. FOUR for STC
        )

    [130] => Array
        (
            [id] => 253
            [commentary] => Royal skipper Chamika back to bowling
        )

    [131] => Array
        (
            [id] => 252
            [commentary] => Pathmanadan to S de Mel, an appeal for a catch by Royal but not given by the umpire. Royalists seem to be desperate for the de Mel's wicket
        )

    [132] => Array
        (
            [id] => 251
            [commentary] => Ramanayake to Madushan, another FOUR from the Thomian skipper.
        )

    [133] => Array
        (
            [id] => 250
            [commentary] => Ramanayake to Madushan, the ball edges again but now it's falling short of the slip fielder. A difficult chance.
        )

    [134] => Array
        (
            [id] => 249
            [commentary] => Madushan Ravichandrakumar, the Thomian skipper comes to the crease and straight away a boundary towards square of the wicket. Intentions are clear from the Thomian dressing room.
        )

    [135] => Array
        (
            [id] => 248
            [commentary] => Finally a secured catch taken by the second slip fielder. Rathnayake goes to the dressing room after a well made 24 for STC. Ramanayke takes the 5th wicket of Thomians.
        )

    [136] => Array
        (
            [id] => 247
            [commentary] => Royal misses another chance of a wicket as the first slip fielder misses an easy catch.
        )

    [137] => Array
        (
            [id] => 246
            [commentary] => Change of field
        )

    [138] => Array
        (
            [id] => 245
            [commentary] => Hit towards fine leg two runs more to STC
        )

    [139] => Array
        (
            [id] => 244
            [commentary] => Ball almost reaches the boundary there brilliantly saved by the Royal fielder.
        )

    [140] => Array
        (
            [id] => 243
            [commentary] => Last year's Royal Skipper Devind Pathmanathan comes  in to ball from the People's Bank end for the 56th over.
        )

    [141] => Array
        (
            [id] => 242
            [commentary] => Break for drinks at the end of the 54th over
        )

    [142] => Array
        (
            [id] => 241
            [commentary] => Winds in from the Northeast at 13 km/h
        )

    [143] => Array
        (
            [id] => 240
            [commentary] => Current partnership is 33 runs off 11.4 overs.
        )

    [144] => Array
        (
            [id] => 239
            [commentary] => 1st ball from Ramanayake, ball meets the edge of the bat and it sails right through the slip region. FOUR runs
        )

    [145] => Array
        (
            [id] => 238
            [commentary] => Bowling change in the 53rd over. Hashen Ramanayake comes to ball from the Press Box end.
        )

    [146] => Array
        (
            [id] => 237
            [commentary] => End of the 51st over STC 163 for the loss of 4 wickets. Run Rate: 3.21
        )

    [147] => Array
        (
            [id] => 236
            [commentary] => FOUR more to de Mel driven through the covers.
        )

    [148] => Array
        (
            [id] => 235
            [commentary] => St. Thomas' surpasses the Royal total with 6 wickets in hand
        )

    [149] => Array
        (
            [id] => 234
            [commentary] => FOUR more to De Mel worked away beautifully on the leg side towards the boundary.
        )

    [150] => Array
        (
            [id] => 233
            [commentary] => Royal College unfortunately missing out on a couple of chances to dismiss the Thomian batsmen.
        )

    [151] => Array
        (
            [id] => 232
            [commentary] => Pathirana to Rathnayake, batsman comes down the crease and he misses the ball. Wicket keeper does a bad job in collecting the ball. An easy stumping missed by Royal.
        )

    [152] => Array
        (
            [id] => 230
            [commentary] => 50th over, spinner Randev Pathirana comes to ball.
        )

    [153] => Array
        (
            [id] => 229
            [commentary] => S. Thomasâ€™ College ( 1st innings ) â€“ 217 all out. Royal College ( 1st innings ) â€“ 150/8 declared. S. Thomasâ€™ College ( 2nd innings ) â€“ 111/8 declared. Royal College ( 2nd innings ) â€“ 96/7 at the end of days play. At the point of declaration, Royal was given a target of 179 to win, due to the initial lead of 67 runs, and the 2nd innings total of 111 which was put up by S. Thomasâ€™ College. As the encounter resulted in a draw, Sachintha De Silva was the star performer for Royal by grabbing 8 wickets in total, and all of them at crucial stages of the respective inningsâ€™.
        )

    [154] => Array
        (
            [id] => 228
            [commentary] => The Mini Battle between the 2nd XI teams of Royal College and S. Thomas' College ended in a draw as it was concluded on the 8th of March 2014, at S. Thomasâ€™ College, Mount Lavinia.
        )

    [155] => Array
        (
            [id] => 227
            [commentary] => Thilakarathne to S de Mel, away from the batsmen and S de Mel makes no mistake. FOUR from the cover region.
        )

    [156] => Array
        (
            [id] => 226
            [commentary] => Karunarathne got a bit wavered length as he balls leg side and too much away from the off side.
        )

    [157] => Array
        (
            [id] => 225
            [commentary] => Karunarathne to Rathnayake, the ball touches the edge of the bat and sails past Gully fielder, difficult but a chance missed by the fielder.
        )

    [158] => Array
        (
            [id] => 224
            [commentary] => S de Mel presenting full face of the bat to Thilakarthne. Solid defense from him
        )

    [159] => Array
        (
            [id] => 222
            [commentary] => Current temperature is at 29 degrees Celsius. Humidity: 51%
        )

    [160] => Array
        (
            [id] => 221
            [commentary] => Too much away to the leg side from Karunarathne. End of 46th over
        )

    [161] => Array
        (
            [id] => 220
            [commentary] => Thomians are just a mere 17 runs away to match the Royal score
        )

    [162] => Array
        (
            [id] => 218
            [commentary] => Royal fielders are clearly on call of duty as they are fielding really well in the 30 yard circle
        )

    [163] => Array
        (
            [id] => 217
            [commentary] => Beautiful environment here at the SSC grounds
        )

    [164] => Array
        (
            [id] => 216
            [commentary] => Anupa Thilakarathne bowling
        )

    [165] => Array
        (
            [id] => 215
            [commentary] => FOUR runs driven away to  the boundary Rathnayake
        )

    [166] => Array
        (
            [id] => 214
            [commentary] => Chamika to Rathnayake, bit away from the batsman to leg side, no pressure for the batsman
        )

    [167] => Array
        (
            [id] => 213
            [commentary] => Tharindu Rathnayake on strike
        )

    [168] => Array
        (
            [id] => 211
            [commentary] => Three slips in place
        )

    [169] => Array
        (
            [id] => 210
            [commentary] => S de Mel on strike
        )

    [170] => Array
        (
            [id] => 209
            [commentary] => Skipper Karunarathne bowling
        )

    [171] => Array
        (
            [id] => 208
            [commentary] => Current run rate is at 3.17
        )

    [172] => Array
        (
            [id] => 206
            [commentary] => Randev Pathirana bowling from People's Bank end.
        )

    [173] => Array
        (
            [id] => 205
            [commentary] => Tharindu Rathnayake replaces Nanayakkara at the crease
        )

    [174] => Array
        (
            [id] => 203
            [commentary] => WICKET H Nanayakkara bowled out byTthilakarathne
        )

    [175] => Array
        (
            [id] => 201
            [commentary] => Current partnership is 8 runs for 6.3 overs
        )

    [176] => Array
        (
            [id] => 200
            [commentary] => STC change for a quick single
        )

    [177] => Array
        (
            [id] => 199
            [commentary] => Anupa Thilakarathne bowling. S de Mel and H Nanayakkara at the crease.
        )

    [178] => Array
        (
            [id] => 198
            [commentary] => Play is about to commence. The Royal and STC Boy's tents explode with cheers.
        )

    [179] => Array
        (
            [id] => 197
            [commentary] => Today is day two of the Battle of the Blues
        )

    [180] => Array
        (
            [id] => 195
            [commentary] => Umpires walk into the field
        )

    [181] => Array
        (
            [id] => 193
            [commentary] => 9:25 a.m. - Match is not yet started but the ground is covered with massive flags of Royal College and St. Thomas' College.
        )

    [182] => Array
        (
            [id] => 192
            [commentary] => As of yesterday the Royal College 1st innings was limited to a 158 runs all out. RC Fall of wickets 1-2 (Dias, 1.5 ov), 2-17 (Hasith Samarasinghe, 8.1 ov), 3-17 (Ramanayake, 8.2 ov), 4-23 (Pathirana, 10.6 ov), 5-44 (Panditharatne, 20.6 ov), 6-58 (Karunaratne, 27.4 ov), 7-59 (Sooriyabandara, 28.2 ov), 8-59 (Pathmanathan, 28.3 ov), 9-155 (Samarasinghe, 49.4 ov), 10-158 (Dhanapala, 50.2 ov). St.Thomas' College currently trails by 24 runs with 7 wickets remaining. Current Batsman: S. de Mel with 40 runs and H. Nanayakkara with 1 run. Fall of wickets 1-26 (Opatha, 5.2 ov), 2-76 (Mendis, 20.4 ov), 3-127 (Sumanasiri, 34.2 ov)
        )

    [183] => Array
        (
            [id] => 191
            [commentary] => Be up to date on this historic encounter with the Battle of the Blues Live Score App
        )

    [184] => Array
        (
            [id] => 190
            [commentary] => Bails off. END OF PLAY - Day 01
        )

    [185] => Array
        (
            [id] => 189
            [commentary] => Short Leg called in by the Royal Skipper
        )

    [186] => Array
        (
            [id] => 188
            [commentary] => Current Temperature 30 degrees Celsius. Humidity: 64%
        )

    [187] => Array
        (
            [id] => 187
            [commentary] => The 96 run Partnership by Harith Samarasinghe and Thiran Dhanapala played in the 1st innings of Royal College breaks the record for the highest partnership for the 9th wicket.
        )

    [188] => Array
        (
            [id] => 186
            [commentary] => The Royal-Thomian then known as the Great Inter-Collegiate Cricket Match was first played at the Galle Face Green (now occupied by the Taj Samudra Hotel).
        )

    [189] => Array
        (
            [id] => 185
            [commentary] => Current Run rate is 3.57
        )

    [190] => Array
        (
            [id] => 184
            [commentary] => H.Nanayakkara replaces Sumanasiri at the crease
        )

    [191] => Array
        (
            [id] => 183
            [commentary] => Stay connected with the Royal College Computer Society. Facebook: www.facebook.com/rccsonline Twitter: www.twitter.com/rccsroyal
        )

    [192] => Array
        (
            [id] => 182
            [commentary] => WICKET: Sumanasiri Pulls and is Caught at the deep
        )

    [193] => Array
        (
            [id] => 181
            [commentary] => FOUR more Sumanasiri cuts down towards the boundary.
        )

    [194] => Array
        (
            [id] => 179
            [commentary] => Current bowler: Devind Pathmanathan
        )

    [195] => Array
        (
            [id] => 178
            [commentary] => Defensive field set by skipper Karunarathne
        )

    [196] => Array
        (
            [id] => 177
            [commentary] => FOUR. Short ball cut away by Sumanasiri.
        )

    [197] => Array
        (
            [id] => 176
            [commentary] => FOUR runs added to the score by Sumanasiri
        )

    [198] => Array
        (
            [id] => 175
            [commentary] => Current Temperature 33 degrees Celsius. Humidity: 51%
        )

    [199] => Array
        (
            [id] => 174
            [commentary] => Played to the leg side by Sumanasiri for a single
        )

    [200] => Array
        (
            [id] => 173
            [commentary] => St Thomas' reaches its century with the loss of two wickets.Close call by Sumanasiri.
        )

    [201] => Array
        (
            [id] => 171
            [commentary] => STC trail by 60 runs with 8 wickets in hand.
        )

    [202] => Array
        (
            [id] => 170
            [commentary] => Current Temperature 32 degrees Celsius. Humidity: 62%
        )

    [203] => Array
        (
            [id] => 169
            [commentary] => St Thomas' College currently has a Run Rate of 3.63
        )

    [204] => Array
        (
            [id] => 168
            [commentary] => De Mel survives a very close call of being caught behind wicket. Bowler: Randev Pathirana
        )

    [205] => Array
        (
            [id] => 167
            [commentary] => Match Officials<br/>Umpires: PG Liyanage and RSA Palliyaguruge<br/>Match referee: WC Labrooy<br/>Reserve umpire: ID Gunawardene
        )

    [206] => Array
        (
            [id] => 166
            [commentary] => Fall of wickets 1-26 (Opatha, 5.2 ov), 2-76 (Mendis, 20.4 ov)<br/>
        )

    [207] => Array
        (
            [id] => 165
            [commentary] => Break for drinks at 25 overs
        )

    [208] => Array
        (
            [id] => 164
            [commentary] => Current Bowler: Chamika Karunarathne
        )

    [209] => Array
        (
            [id] => 163
            [commentary] => End of the 24th over. STC 92 for the loss of 2 wickets
        )

    [210] => Array
        (
            [id] => 162
            [commentary] => Hit towards square leg. Three Runs to STC
        )

    [211] => Array
        (
            [id] => 161
            [commentary] => The 135th Battle of the Blues Live Score App is sponsored by the Royal College Group of 2010.
        )

    [212] => Array
        (
            [id] => 160
            [commentary] => Called a NO BALL.
        )

    [213] => Array
        (
            [id] => 159
            [commentary] => FOUR more by Sumanasiri. Called a WIDE
        )

    [214] => Array
        (
            [id] => 158
            [commentary] => FOUR Smashed to the deep extra cover by Sumanasiri
        )

    [215] => Array
        (
            [id] => 157
            [commentary] => T Sumanasiri arrives at the crease.
        )

    [216] => Array
        (
            [id] => 156
            [commentary] => WICKET Yohan Mendis Bowled by Karunarathne.
        )

    [217] => Array
        (
            [id] => 155
            [commentary] => Close Call by Mendis
        )

    [218] => Array
        (
            [id] => 154
            [commentary] => End of the 19th over. STC 75 for the loss of 1 wicket.
        )

    [219] => Array
        (
            [id] => 153
            [commentary] => Royal College and St. Thomas' College were founded in the years 1835 and 1851 respectively.
        )

    [220] => Array
        (
            [id] => 151
            [commentary] => FOUR more down the track by Mendis
        )

    [221] => Array
        (
            [id] => 150
            [commentary] => Current Bowler: Chamika Karunarathne
        )

    [222] => Array
        (
            [id] => 149
            [commentary] => Two slips in place
        )

    [223] => Array
        (
            [id] => 148
            [commentary] =>  Risky shot by S De Mel
        )

    [224] => Array
        (
            [id] => 146
            [commentary] => Score moves up to 65
        )

    [225] => Array
        (
            [id] => 145
            [commentary] => FOUR. Mendis hits towards the fine leg boundary.
        )

    [226] => Array
        (
            [id] => 144
            [commentary] => FOUR smashed towards the boundary by Mendis
        )

    [227] => Array
        (
            [id] => 143
            [commentary] => Current Bowler: Hashen Ramanayake
        )

    [228] => Array
        (
            [id] => 142
            [commentary] => Break for drinks at 12 overs.
        )

    [229] => Array
        (
            [id] => 141
            [commentary] => The Royal-Thomian is the ONLY school cricket encounter in the country played throughout three days. It was played for this duration since the centenary match in 1979.
        )

    [230] => Array
        (
            [id] => 140
            [commentary] => FOUR more through the covers by Mendis.
        )

    [231] => Array
        (
            [id] => 137
            [commentary] => FOUR more yet again by S de Mel
        )

    [232] => Array
        (
            [id] => 136
            [commentary] => FOUR smashed towards the boundary by S de Mel
        )

    [233] => Array
        (
            [id] => 135
            [commentary] => FOUR more to STC smashed by Y. Mendis
        )

    [234] => Array
        (
            [id] => 134
            [commentary] => The flag taken around the ground by the Royal College Prefects Council is a 135 metres long and had adorned the Main Building at Royal College for the past month
        )

    [235] => Array
        (
            [id] => 133
            [commentary] => 6.5 Three runs to STC
        )

    [236] => Array
        (
            [id] => 132
            [commentary] => Appeal for LBW by Karunarathne. Not given.
        )

    [237] => Array
        (
            [id] => 131
            [commentary] => STC 27 for the loss of 1 wicket after 6 overs
        )

    [238] => Array
        (
            [id] => 130
            [commentary] => S De Mel replaces Opatha at the crease.
        )

    [239] => Array
        (
            [id] => 129
            [commentary] => WICKET. Rashmika Opatha bowled by Anupa Thilakarathne.
        )

    [240] => Array
        (
            [id] => 128
            [commentary] => FOUR hit down the leg side by Mendis
        )

    [241] => Array
        (
            [id] => 127
            [commentary] => Karunarathne bowling from the Commentary box end.
        )

    [242] => Array
        (
            [id] => 126
            [commentary] => Current temperature is 32 degrees Celsius. Humidity: 55%
        )

    [243] => Array
        (
            [id] => 125
            [commentary] => Appeal for a catch by 2nd Slip. Not given
        )

    [244] => Array
        (
            [id] => 124
            [commentary] => FOUR more. Shot down towards fine leg boundary by Rashmika Opatha
        )

    [245] => Array
        (
            [id] => 123
            [commentary] => Quick single. Appealed for a run out. Not given
        )

    [246] => Array
        (
            [id] => 122
            [commentary] => FOUR more to Opatha
        )

    [247] => Array
        (
            [id] => 121
            [commentary] => End of the 2nd over. Bowler: Anupa Thilakarathne
        )

    [248] => Array
        (
            [id] => 120
            [commentary] => FOUR. Third consecutive boundary by Opatha
        )

    [249] => Array
        (
            [id] => 118
            [commentary] => FOUR more to Opatha down the Covers
        )

    [250] => Array
        (
            [id] => 117
            [commentary] => FOUR Down towards fine leg boundary by Opatha
        )

    [251] => Array
        (
            [id] => 116
            [commentary] => Three slips and a gully in place
        )

    [252] => Array
        (
            [id] => 115
            [commentary] => Maiden over by Karunarathne
        )

    [253] => Array
        (
            [id] => 114
            [commentary] => Down the leg side no chance for a run
        )

    [254] => Array
        (
            [id] => 113
            [commentary] => Skipper Chamika Karunarathne bowling
        )

    [255] => Array
        (
            [id] => 112
            [commentary] => Three slips in place
        )

    [256] => Array
        (
            [id] => 111
            [commentary] => St. Thomas' innings opened by R. Opatha and Y.Mendis
        )

    [257] => Array
        (
            [id] => 110
            [commentary] => Players return to the field.
        )

    [258] => Array
        (
            [id] => 109
            [commentary] => Hasitha Samarasinghe and Thiran Dhanapala broke the record for the highest partnership for the 8th, 9th or 10th wicket with Samarasinghe scoring a half century.
        )

    [259] => Array
        (
            [id] => 108
            [commentary] => WICKET Dhanapala caught at Short mid wicket. That's the end of the Royal 1st innings.
        )

    [260] => Array
        (
            [id] => 107
            [commentary] => Anupa Thilakaratne replaces Samaraisnghe at the crease. End of the 48th over
        )

    [261] => Array
        (
            [id] => 106
            [commentary] => WICKET Hasitha Samarasinghe returns to the pavilion caught behind by the wicket keeper Sanesh De Mel
        )

    [262] => Array
        (
            [id] => 102
            [commentary] => The traditional cycle parades of both schools took place yesterday the 12th of March. These parades reminisce of the days when school boys used to arrive and leave the match on bicycles.
        )

    [263] => Array
        (
            [id] => 101
            [commentary] => Royal reaches its 150 run milestone
        )

    [264] => Array
        (
            [id] => 100
            [commentary] => Samarasinghe and Dhanapala 12 run short of a 100 runs partnership.
        )

    [265] => Array
        (
            [id] => 99
            [commentary] => FOUR more to Samarasinghe. Smashed towards mid on.
        )

    [266] => Array
        (
            [id] => 98
            [commentary] => FOUR cut away towards deep square point by Samarasinghe
        )

    [267] => Array
        (
            [id] => 97
            [commentary] => Current temperature is 34 degrees Celsius.Humidity: 36%
        )

    [268] => Array
        (
            [id] => 96
            [commentary] => FOUR runs to Dhanapala. smashed to deep square leg
        )

    [269] => Array
        (
            [id] => 94
            [commentary] => 44.5 Hit to mid wicket. One run
        )

    [270] => Array
        (
            [id] => 93
            [commentary] => 44.1 Two runs to Royal College
        )

    [271] => Array
        (
            [id] => 92
            [commentary] => Maiden 43rd over by Tharindu Rathnayake
        )

    [272] => Array
        (
            [id] => 91
            [commentary] => Tharindu Rathnayake bowling
        )

    [273] => Array
        (
            [id] => 90
            [commentary] => Royal gradually recovering from the loss of 8 early wickets.
        )

    [274] => Array
        (
            [id] => 89
            [commentary] => Punched away towards the covers by Samarasinghe.
        )

    [275] => Array
        (
            [id] => 88
            [commentary] => Solid partnership by Dhanapala and Samarasinghe
        )

    [276] => Array
        (
            [id] => 87
            [commentary] => 41.4 Keeper closes in on the wicket
        )

    [277] => Array
        (
            [id] => 86
            [commentary] => 41.3 Dhanapala leaves the ball
        )

    [278] => Array
        (
            [id] => 85
            [commentary] => H. Nanayakkara Bowling
        )

    [279] => Array
        (
            [id] => 84
            [commentary] => 41 overs. Royal College 127 at the loss of 8 wickets
        )

    [280] => Array
        (
            [id] => 83
            [commentary] => 40.3 Batsman Leaves the ball
        )

    [281] => Array
        (
            [id] => 82
            [commentary] => FOUR flipped towards third man boundary by Dhanapala
        )

    [282] => Array
        (
            [id] => 81
            [commentary] => Sahan Wijesinghe Bowling
        )

    [283] => Array
        (
            [id] => 80
            [commentary] => Live updates of the 135th Battle of the Blues brought to you by the Royal College Computer Society from the S.S.C. grounds.
        )

    [284] => Array
        (
            [id] => 79
            [commentary] => 39 overs with Royal at 117 for the loss of 8 wickets. Break for drinks.
        )

    [285] => Array
        (
            [id] => 78
            [commentary] => 38.4 Dot Ball
        )

    [286] => Array
        (
            [id] => 77
            [commentary] => 38.3 FOUR to Samarasinghe. Smashed towards the Royal Boy's tent at Deep point.
        )

    [287] => Array
        (
            [id] => 76
            [commentary] => 38.2 Hits to mid wicket for one run
        )

    [288] => Array
        (
            [id] => 75
            [commentary] => 38.1 Single to Samarasinghe
        )

    [289] => Array
        (
            [id] => 73
            [commentary] => 37.1 Appealed for a catch behind. Not given
        )

    [290] => Array
        (
            [id] => 72
            [commentary] => The Royal Boy's tent explodes with cheers
        )

    [291] => Array
        (
            [id] => 71
            [commentary] => FOUR. Smashed to deep point
        )

    [292] => Array
        (
            [id] => 70
            [commentary] => 36.3 Three runs to Dhanapala. Good running by the two batsman
        )

    [293] => Array
        (
            [id] => 69
            [commentary] => 36.3 Three runs to Dhanapala
        )

    [294] => Array
        (
            [id] => 67
            [commentary] => 36.2 No runs
        )

    [295] => Array
        (
            [id] => 66
            [commentary] => 35.2 No runs
        )

    [296] => Array
        (
            [id] => 65
            [commentary] => Royal 2 shy of 100
        )

    [297] => Array
        (
            [id] => 64
            [commentary] => 36.1 Single to Dhanapala
        )

    [298] => Array
        (
            [id] => 63
            [commentary] => 35.5 FOUR more to Samarasinghe
        )

    [299] => Array
        (
            [id] => 62
            [commentary] => 35.4 FOUR runs to Samarasinghe. Ball rolls to the fence at the deep point. brilliant shot
        )

    [300] => Array
        (
            [id] => 61
            [commentary] => 35.3 Hits to Long off. No run
        )

    [301] => Array
        (
            [id] => 60
            [commentary] => 35.2 Single to Dhanapala
        )

    [302] => Array
        (
            [id] => 59
            [commentary] => 35.1 hit to long on. no runs.
        )

    [303] => Array
        (
            [id] => 58
            [commentary] => 34.4 Chance to the second slip. Dropped
        )

    [304] => Array
        (
            [id] => 57
            [commentary] => 34.3 Dot ball
        )

    [305] => Array
        (
            [id] => 56
            [commentary] => 34.2 Three runs to Dhanapala
        )

    [306] => Array
        (
            [id] => 55
            [commentary] => Current temperature is 35 degrees Celsius. Humidity: 48%
        )

    [307] => Array
        (
            [id] => 53
            [commentary] => Fast Bowlers at an advantage at the recently relaid S.S.C. turf.
        )

    [308] => Array
        (
            [id] => 52
            [commentary] => Enthusiastic cheers from the boys tents of Royal College and St. Thomas' College
        )

    [309] => Array
        (
            [id] => 51
            [commentary] => Royal College currently holds the Senanayake Shield and the Mustangs Trophy (limited overs)
        )

    [310] => Array
        (
            [id] => 50
            [commentary] => End of the 32nd over.
        )

    [311] => Array
        (
            [id] => 49
            [commentary] => 32.2 FOUR more to Samarasinghe
        )

    [312] => Array
        (
            [id] => 48
            [commentary] => That's the end of the 31st over
        )

    [313] => Array
        (
            [id] => 47
            [commentary] => The straw hat along with a coloured sash in english school tradition was worn by students of both schools at all formal events later replaced by school ties. The Straw Hat is now only seen at the Big Match
        )

    [314] => Array
        (
            [id] => 46
            [commentary] => 30.3 Dropped at first slip
        )

    [315] => Array
        (
            [id] => 45
            [commentary] => 30.2 Misfielded. FOUR more to Royal
        )

    [316] => Array
        (
            [id] => 44
            [commentary] => 31.0 WIDE
        )

    [317] => Array
        (
            [id] => 43
            [commentary] => 30.3 Another NO BALL
        )

    [318] => Array
        (
            [id] => 42
            [commentary] => Current Bowler: Tharindu Rathnayake
        )

    [319] => Array
        (
            [id] => 41
            [commentary] => FOUR more to Royal. Samarasinghe cutting down towards deep point
        )

    [320] => Array
        (
            [id] => 40
            [commentary] => FOUR Harith Samarasinghe smashes towards the deep backward point.
        )

    [321] => Array
        (
            [id] => 39
            [commentary] => Harith Samarasinghe replaces Devind Pathmanathan
        )

    [322] => Array
        (
            [id] => 37
            [commentary] => Wijesinghe on a Hat trick
        )

    [323] => Array
        (
            [id] => 36
            [commentary] => WICKET Devind Pathmanathan gone for a duck.
        )

    [324] => Array
        (
            [id] => 35
            [commentary] => Royal at risk with the loss of 7 wickets
        )

    [325] => Array
        (
            [id] => 34
            [commentary] => WICKET Sooriyabandara gone for a duck
        )

    [326] => Array
        (
            [id] => 33
            [commentary] => End of the 26th over Royal College 59/6
        )

    [327] => Array
        (
            [id] => 31
            [commentary] => WICKET Karunarathne trying to cut the ball but was caught. Returns to the pavilion with 11 runs.
        )

    [328] => Array
        (
            [id] => 30
            [commentary] => FOUR, Karunarathne smashes the ball to deep square for a Boundary
        )

    [329] => Array
        (
            [id] => 29
            [commentary] => Thiran Dhanapala on strike
        )

    [330] => Array
        (
            [id] => 28
            [commentary] => Match resumes after lunch
        )

    [331] => Array
        (
            [id] => 27
            [commentary] => Summary: at Lunch the Royal innings stands at 52 for 5 wickets, Karunarathne: 6, Dhanapala: 3. 26 overs.
        )

    [332] => Array
        (
            [id] => 26
            [commentary] => LUNCH BREAK
        )

    [333] => Array
        (
            [id] => 25
            [commentary] => St. Thomas' is captained by Madushan Ravichandrakumara, 4th year coloursman, right hand middle order batsman, Right arm leg spinner
        )

    [334] => Array
        (
            [id] => 24
            [commentary] => Royal College holds the Records for the highest and lowest innings score, 432 in 2006 and 9 in 1885 respectively.
        )

    [335] => Array
        (
            [id] => 23
            [commentary] => Royal skipper Karunarathne is a member of the Sri Lanka U19 side. He captained the Sri Lanka U17 which toured the UK
        )

    [336] => Array
        (
            [id] => 22
            [commentary] => Royal College reaches 50 runs after 25 overs at the expense of 5 wickets.
        )

    [337] => Array
        (
            [id] => 21
            [commentary] => STC appeals for a wicket but is called a NO BALL.
        )

    [338] => Array
        (
            [id] => 20
            [commentary] => 24.1 Karunarathne flips to the fine leg for a single
        )

    [339] => Array
        (
            [id] => 19
            [commentary] => The series tally currently stands with 34 victories for each side and 66 matches drawn.
        )

    [340] => Array
        (
            [id] => 18
            [commentary] => Karunarathne drives to the mid on for a single
        )

    [341] => Array
        (
            [id] => 17
            [commentary] => Thiran Danapala replaces Panditharathne at the crease
        )

    [342] => Array
        (
            [id] => 16
            [commentary] => The Battle of the Blues is played for the Senanayake Shield. The Hon. D.S.Senanayake himself played for the Thomian side.
        )

    [343] => Array
        (
            [id] => 15
            [commentary] => WICKET, Panditharathne caught at Backward short leg
        )

    [344] => Array
        (
            [id] => 14
            [commentary] => Nanayakkara to Chamika, tries to play hard
        )

    [345] => Array
        (
            [id] => 13
            [commentary] => Chamika at the crease
        )

    [346] => Array
        (
            [id] => 12
            [commentary] => Pandithrathna smashes the ball towards the boundary for FOUR more.
        )

    [347] => Array
        (
            [id] => 11
            [commentary] => Tharindu Rathnayake currently balling to G. Panditharathne
        )

    [348] => Array
        (
            [id] => 9
            [commentary] => Well balled Chamika plays defensively
        )

    [349] => Array
        (
            [id] => 7
            [commentary] => Chamika Karunaratne, Skipper to the crease
        )

    [350] => Array
        (
            [id] => 6
            [commentary] => Randev Pathirana Bowled for 6 runs
        )

    [351] => Array
        (
            [id] => 5
            [commentary] => Royal College 17/3 after 9 overs
        )

    [352] => Array
        (
            [id] => 4
            [commentary] => STC off to a good start with 3 wickets off Royal College
        )

    [353] => Array
        (
            [id] => 3
            [commentary] => Randev to the crease
        )

    [354] => Array
        (
            [id] => 2
            [commentary] => This is the Royal College Computer Society bringing you updates on the 135th Battle of the Blues live from SSC Grounds
        )

    [355] => Array
        (
            [id] => 1
            [commentary] =>  The Royal-Thomian is the second longest running cricket series IN THE WORLD second only to the Intercol played by St.Peters College, Adelaide and Prince Alfred College...
        )

)



);

print_r($arr);



?>