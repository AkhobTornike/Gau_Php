INSERT IGNORE INTO comments (post_id, user_id, name, email, comment, status, parent_comment_id) VALUES
(1, 4, NULL, "lisa.m@example.com", "Great article! Very informative.", "approved", NULL),
(1, NULL, "TechFan", "techfan@anonymous.com", "I have a question about the AI applications mentioned...", "pending", 1),
(2, 7, NULL, "david.lee@example.com", "This Italian food journey sounds amazing!", "approved", NULL),
(2, 15, NULL, "ethan.c@example.com", "What are your favorite pasta dishes?", "approved", 3),
(3, 1, NULL, "john.doe@example.com", "Thanks for the healthy lifestyle tips!", "approved", NULL),
(3, NULL, "HealthyLiving", "hl@anonymous.com", "Any advice for beginners?", "pending", 5),
(4, 10, NULL, "olivia.g@example.com", "Southeast Asia is definitely on my travel list now.", "approved", NULL),
(4, 18, NULL, "william.a@example.com", "Which countries did you visit?", "approved", 7),
(5, 6, NULL, "sara.jones@example.com", "Beautiful landscape photos!", "approved", NULL),
(5, NULL, "PhotoLover", "pl@anonymous.com", "What camera gear do you recommend?", "pending", 9),
(6, 13, NULL, "benjamin.h@example.com", "The history of gaming consoles is fascinating.", "approved", NULL),
(6, NULL, "GamerX", "gamerx@anonymous.com", "What was your first console?", "approved", 11),
(7, 2, NULL, "jane.smith@example.com", "Understanding climate change is crucial.", "approved", NULL),
(7, 19, NULL, "charlotte.n@example.com", "Are there any solutions discussed?", "approved", 13),
(8, 5, NULL, "peter.pan@example.com", "Great tips for starting an online business.", "approved", NULL),
(8, NULL, "BizOwner", "bo@anonymous.com", "How important is SEO?", "pending", 15),
(9, 12, NULL, "sophia.d@example.com", "Mindfulness meditation has helped me a lot.", "approved", NULL),
(9, 8, NULL, "emily.brown@example.com", "Any good guided meditation apps?", "approved", 17),
(10, 17, NULL, "noah.s@example.com", "Love these DIY home decor ideas!", "approved", NULL),
(10, NULL, "DIYer", "diyer@anonymous.com", "Where can I find more inspiration?", "pending", 19),
(1, 9, NULL, "michael.w@example.com", "Interesting perspective on blockchain.", "approved", 2),
(2, 16, NULL, "ava.l@example.com", "Bangkok street food looks delicious!", "approved", 4),
(3, 3, NULL, "admin123@example.com", "Good reminders for a healthy life.", "approved", 6),
(4, 11, NULL, "james.r@example.com", "Planning a trip to Southeast Asia soon!", "approved", 8),
(5, 18, NULL, "william.a@example.com", "Your photography skills are impressive.", "approved", 10),
(6, 14, NULL, "mia.t@example.com", "The evolution of gaming is wild!", "approved", 12),
(7, 10, NULL, "olivia.g@example.com", "More people need to understand climate science.", "approved", 14),
(8, 1, NULL, "john.doe@example.com", "Thanks for the online business advice.", "approved", 16),
(9, 7, NULL, "david.lee@example.com", "Mindfulness is so important.", "approved", 18),
(10, 4, NULL, "lisa.m@example.com", "Will try some of these DIY ideas.", "approved", 20),
(11, 15, NULL, "ethan.c@example.com", "Blockchain has so much potential.", "approved", NULL),
(12, 6, NULL, "sara.jones@example.com", "Bangkok is a food paradise!", "approved", NULL),
(13, 2, NULL, "jane.smith@example.com", "Small changes make a big difference in health.", "approved", NULL),
(14, 19, NULL, "charlotte.n@example.com", "The Swiss Alps are stunning.", "approved", NULL),
(15, 9, NULL, "michael.w@example.com", "Night sky photography is challenging but rewarding.", "approved", NULL),
(16, 12, NULL, "sophia.d@example.com", "Indie games are often very creative.", "approved", NULL),
(17, 5, NULL, "peter.pan@example.com", "Quantum physics is mind-bending.", "approved", NULL),
(18, 16, NULL, "ava.l@example.com", "Good marketing tips for small businesses.", "approved", NULL),
(19, 3, NULL, "admin123@example.com", "Diet definitely affects mental health.", "approved", NULL),
(20, 11, NULL, "james.r@example.com", "Looking forward to trying some sewing projects.", "approved", NULL),
(1, 17, NULL, "noah.s@example.com", "More articles on AI please!", "approved", NULL),
(2, 8, NULL, "emily.brown@example.com", "Planning my Italian food tour now!", "approved", NULL),
(3, 14, NULL, "mia.t@example.com", "Need to incorporate more exercise.", "approved", NULL),
(4, 1, NULL, "john.doe@example.com", "Southeast Asia looks incredible.", "approved", NULL),
(5, 10, NULL, "olivia.g@example.com", "Thanks for the photography tips!", "approved", NULL),
(6, 7, NULL, "david.lee@example.com", "Love playing indie games.", "approved", NULL),
(7, 4, NULL, "lisa.m@example.com", "Science is so interesting.", "approved", NULL),
(8, 13, NULL, "benjamin.h@example.com", "Marketing is key for startups.", "approved", NULL),
(9, 6, NULL, "sara.jones@example.com", "Need to focus more on mindfulness.", "approved", NULL),
(10, 19, NULL, "charlotte.n@example.com", "Excited to try some DIY projects.", "approved", NULL),
(11, 2, NULL, "jane.smith@example.com", "Blockchain technology is revolutionary.", "approved", NULL),
(12, 9, NULL, "michael.w@example.com", "Bangkok street food is a must-try.", "approved", NULL),
(13, 16, NULL, "ava.l@example.com", "Small fitness routines are manageable.", "approved", NULL),
(14, 5, NULL, "peter.pan@example.com", "The Swiss Alps are calling!", "approved", NULL),
(15, 12, NULL, "sophia.d@example.com", "Night photography is on my list.", "approved", NULL),
(16, 3, NULL, "admin123@example.com", "Supporting indie game developers.", "approved", NULL),
(17, 18, NULL, "william.a@example.com", "Quantum physics still blows my mind.", "approved", NULL),
(18, 8, NULL, "emily.brown@example.com", "Marketing on a budget is crucial.", "approved", NULL),
(19, 14, NULL, "mia.t@example.com", "Focusing on a better diet.", "approved", NULL),
(20, 1, NULL, "john.doe@example.com", "Looking for more beginner sewing projects.", "approved", NULL),
(1, NULL, "CuriousReader", "cr@anonymous.com", "Can you elaborate on the AI ethics?", "pending", 21),
(2, NULL, "FoodieTraveler", "ft@anonymous.com", "Any recommendations for specific restaurants in Italy?", "pending", 23),
(3, NULL, "WellnessGuru", "wg@anonymous.com", "What are some good beginner exercises?", "pending", 25),
(4, NULL, "Wanderlust", "wl@anonymous.com", "Which Southeast Asian countries are best for solo travel?", "pending", 27),
(5, NULL, "ApertureFan", "af@anonymous.com", "What are some common mistakes in landscape photography?", "pending", 29),
(6, NULL, "RetroGamer", "rg@anonymous.com", "What was the best era for gaming?", "pending", 31),
(7, NULL, "ScienceBuff", "sb@anonymous.com", "Is there any hope for reversing climate change?", "pending", 33),
(8, NULL, "EcommStart", "es@anonymous.com", "How do you build an email list?", "pending", 35),
(9, NULL, "MindfulMom", "mm@anonymous.com", "Are there any resources for guided meditation for kids?", "pending", 37),
(10, NULL, "CraftyCreator", "cc@anonymous.com", "Looking for ideas for upcycling clothes.", "pending", 39),
(11, NULL, "BlockChainDev", "bd@anonymous.com", "What are the security challenges with blockchain?", "pending", 41),
(12, NULL, "StreetFoodie", "sf@anonymous.com", "Any vegetarian options in Bangkok?", "pending", 43),
(13, NULL, "FitAtHome", "fh@anonymous.com", "What are some good bodyweight exercises?", "pending", 45),
(14, NULL, "AlpsExplorer", "ae@anonymous.com", "What is the best time of year to hike in the Swiss Alps?", "pending", 47),
(15, NULL, "StarGazer", "sg@anonymous.com", "What equipment is needed for night sky photography?", "pending", 49),
(16, NULL, "IndieDevFan", "idf@anonymous.com", "What are some popular indie game engines?", "pending", 51),
(17, NULL, "QuantumCurious", "qc@anonymous.com", "What are some practical applications of quantum physics?", "pending", 53),
(18, NULL, "MarketGuru", "mg@anonymous.com", "What are some free marketing tools?", "pending", 55),
(19, NULL, "Nutritionist", "nu@anonymous.com", "What are some foods that boost mood?", "pending", 57),
(20, NULL, "SewingNewbie", "sn@anonymous.com", "What are some essential sewing tools?", "pending", 59),
(1, 11, NULL, "james.r@example.com", "AI is rapidly changing everything.", "approved", NULL),
(2, 18, NULL, "william.a@example.com", "Italy has the best food!", "approved", NULL),
(3, 15, NULL, "ethan.c@example.com", "Consistency is key for a healthy lifestyle.", "approved", NULL),
(4, 7, NULL, "david.lee@example.com", "Can\'t wait to explore Southeast Asia.", "approved", NULL),
(5, 1, NULL, "john.doe@example.com", "Your photos are inspiring.", "approved", NULL),
(6, 10, NULL, "olivia.g@example.com", "So many great games out there.", "approved", NULL),
(7, 16, NULL, "ava.l@example.com", "Climate change affects us all.", "approved", NULL),
(8, 4, NULL, "lisa.m@example.com", "Marketing on a shoestring budget is tough.", "approved", NULL),
(9, 13, NULL, "benjamin.h@example.com", "Mindfulness helps with stress.", "approved", NULL),
(10, 6, NULL, "sara.jones@example.com", "Upcycling is a great way to be sustainable.", "approved", NULL),
(11, 19, NULL, "charlotte.n@example.com", "Blockchain is still a bit confusing to me.", "approved", NULL),
(12, 2, NULL, "jane.smith@example.com", "Street food is the best way to experience a culture.", "approved", NULL),
(13, 17, NULL, "noah.s@example.com", "Looking for more workout routines.", "approved", NULL),
(14, 8, NULL, "emily.brown@example.com", "The Alps look majestic.", "approved", NULL),
(15, 14, NULL, "mia.t@example.com", "Want to learn more about night photography.", "approved", NULL),
(16, 5, NULL, "peter.pan@example.com", "Indie games often have unique stories.", "approved", NULL),
(17, 12, NULL, "sophia.d@example.com", "Quantum physics is fascinating but complex.", "approved", NULL),
(18, 3, NULL, "admin123@example.com", "Marketing requires constant adaptation.", "approved", NULL),
(19, 11, NULL, "james.r@example.com", "A balanced diet is so important.", "approved", NULL),
(20, 18, NULL, "william.a@example.com", "Ready to start my first sewing project!", "approved", NULL);