export default {

    methods: {
        getWords: function (wordin) {

            var word;
            var stop_word;
            var your_wording = wordin.toString();


            var words = your_wording.match(/[^\s]+|\s+[^\s+]$/g);

            for (var i = 0; i < words.length; i++) {

                for (var x = 0; x < this.getDictionary().length; x++) {
                    word = words[i].replace(/\s+|[^a-z]+/ig, "");

                    stop_word = this.getDictionary()[x];

                    if (word.toLowerCase() == stop_word) {
                        // Remove any found word from the keywords
                        your_wording = your_wording.replace(this.regexStopWord(stop_word), " ");
                    }
                }
            }

            return your_wording.replace(/^\s+|\s+$/g, "").split(' ');

        },
        regexStopWord: function (stop_word) {
            var regex;
            var regex_str;

            // Trim stop word with regex
            regex_str = "^\\s*" + stop_word + "\\s*$";
            regex_str += "|^\\s*" + stop_word + "\\s+";
            regex_str += "|\\s+" + stop_word + "\\s*$";
            regex_str += "|\\s+" + stop_word + "\\s+";
            regex = new RegExp(regex_str, "ig");

            return regex;
        },
        getDictionary: function () {
            return [

                "a", "about", "above", "across", "after", "again", "against", "all", "almost", "alone", "along", "already", "also", "although",
                "always", "among", "an", "and", "another", "any", "anybody", "anyone", "anything", "anywhere", "are", "area", "areas", "around",
                "as", "ask", "asked", "asking", "asks", "at", "away", "b", "back", "backed", "backing", "backs", "be", "became", "because", "become",
                "becomes", "been", "before", "began", "behind", "being", "beings", "best", "better", "between", "big", "both", "but", "by", "c", "came",
                "can", "cannot", "case", "cases", "certain", "certainly", "clear", "clearly", "come", "could", "d", "did", "differ", "different", "differently",
                "do", "does", "done", "down", "down", "downed", "downing", "downs", "during", "e", "each", "early", "either", "end", "ended", "ending", "ends",
                "enough", "even", "evenly", "ever", "every", "everybody", "everyone", "everything", "everywhere", "f", "face", "faces", "fact", "facts",
                "far", "felt", "few", "find", "ok",
                "finds",
                "first",
                "for",
                "four",
                "from",
                "full",
                "fully",
                "further",
                "furthered",
                "furthering",
                "furthers",
                "g",
                "gave",
                "general",
                "generally",
                "get",
                "gets",
                "give",
                "given",
                "gives",
                "go",
                "going",
                "good",
                "goods",
                "got",
                "great",
                "greater",
                "greatest",
                "group",
                "grouped",
                "grouping",
                "groups",
                "h",
                "had",
                "has",
                "have",
                "having",
                "he",
                "her",
                "here",
                "herself",
                "high",
                "high",
                "high",
                "higher",
                "highest",
                "him",
                "himself",
                "his",
                "how",
                "however",
                "i",
                "if",
                "important",
                "in",
                "interest",
                "interested",
                "interesting",
                "interests",
                "into",
                "is",
                "it",
                "its",
                "itself",
                "j",
                "just",
                "k",
                "keep",
                "keeps",
                "kind",
                "knew",
                "know",
                "known",
                "knows",
                "l",
                "large",
                "largely",
                "last",
                "later",
                "latest",
                "least",
                "less",
                "let",
                "lets",
                "like",
                "likely",
                "long",
                "longer",
                "longest",
                "m",
                "made",
                "make",
                "making",
                "man",
                "many",
                "may",
                "me",
                "member",
                "members",
                "men",
                "might",
                "more",
                "most",
                "mostly",
                "mr",
                "mrs",
                "much",
                "must",
                "my",
                "myself",
                "n",
                "necessary",
                "need",
                "needed",
                "needing",
                "needs",
                "never",
                "new",
                "new",
                "newer",
                "newest",
                "next",
                "no",
                "nobody",
                "non",
                "noone",
                "not",
                "nothing",
                "now",
                "nowhere",
                "number",
                "numbers",
                "o",
                "of",
                "off",
                "often",
                "old",
                "older",
                "oldest",
                "on",
                "once",
                "one",
                "only",
                "open",
                "opened",
                "opening",
                "opens",
                "or",
                "order",
                "ordered",
                "ordering",
                "orders",
                "other",
                "others",
                "our",
                "out",
                "over",
                "p",
                "part",
                "parted",
                "parting",
                "parts",
                "per",
                "perhaps",
                "place",
                "places",
                "point",
                "pointed",
                "pointing",
                "points",
                "possible",
                "present",
                "presented",
                "presenting",
                "presents",
                "problem",
                "problems",
                "put",
                "puts",
                "q",
                "quite",
                "r",
                "rather",
                "really",
                "right",
                "right",
                "room",
                "rooms",
                "s",
                "said",
                "same",
                "saw",
                "say",
                "says",
                "second",
                "seconds",
                "see",
                "seem",
                "seemed",
                "seeming",
                "seems",
                "sees",
                "several",
                "shall",
                "she",
                "should",
                "show",
                "showed",
                "showing",
                "shows",
                "side",
                "sides",
                "since",
                "small",
                "smaller",
                "smallest",
                "so",
                "some",
                "somebody",
                "someone",
                "something",
                "somewhere",
                "state",
                "states",
                "still",
                "till",
                "such",
                "sure",
                "t",
                "take",
                "taken",
                "than",
                "that",
                "the",
                "their",
                "them",
                "then",
                "there",
                "therefore",
                "these",
                "they",
                "thing",
                "things",
                "think",
                "thinks",
                "this",
                "those",
                "though",
                "thought",
                "thoughts",
                "three",
                "through",
                "thus",
                "to",
                "today",
                "together",
                "too",
                "took",
                "toward",
                "turn",
                "turned",
                "turning",
                "turns",
                "two",
                "u",
                "under",
                "until",
                "up",
                "upon",
                "us",
                "use",
                "used",
                "uses",
                "v",
                "very",
                "w",
                "want",
                "wanted",
                "wanting",
                "wants",
                "was",
                "way",
                "ways",
                "we",
                "well",
                "wells",
                "went",
                "were",
                "what",
                "when",
                "where",
                "whether",
                "which",
                "while",
                "who",
                "whole",
                "whose",
                "why",
                "will",
                "with",
                "within",
                "without",
                "work",
                "worked",
                "working",
                "works",
                "would",
                "x",
                "we'd",
                "we'll",
                "we're",
                "we've",
                "y",
                "year",
                "years",
                "yet",
                "you",
                "young",
                "younger",
                "youngest",
                "your",
                "yours",
                "z",
                "achter","achterna","afgelopen","al","aldaar","aldus","alhoewel","alias","alle","allebei","alleen","alsnog","altijd","altoos","ander","andere","anders","anderszins",
                "behalve","behoudens","beide","beiden","ben","beneden","bent","bepaald","betreffende","bij","binnen","binnenin","boven","bovenal","bovendien","bovengenoemd","bovenstaand",
                "bovenvermeld","buiten","daar","daarheen","daarin","daarna","daarnet","daarom","daarop","daarvanlangs","dan","dat","de","die","dikwijls","dit","door","doorgaand","dus","echter",
                "eer","eerdat","eerder","eerlang","eerst","elk","elke","en","enig","enigszins","enkel","er","erdoor","even","eveneens","evenwel","gauw","gedurende","geen","gehad","gekund","geleden",
                "gelijk","gemoeten","gemogen","geweest","gewoon","gewoonweg","haar","had","hadden","hare","heb","hebben","hebt","heeft","hem","hen","het","hierbeneden","hierboven","hij","hoe","hoewel",
                "hun","hunne","ik","ikzelf","in","inmiddels","inzake","is","jezelf","jij","jijzelf","jou","jouw","jouwe","juist","jullie","kan","klaar","kon","konden","krachtens","kunnen","kunt","later",
                "liever","maar","mag","meer","met","mezelf","mij","mijn","mijnent","mijner","mijzelf","misschien","mocht","mochten","moest","moesten","moet","moeten","mogen","na","naar","nadat","net","niet",
                "noch","nog","nogal","nu","of","ofschoon","om","omdat","omhoog","omlaag","omstreeks","omtrent","omver","onder","ondertussen","ongeveer","ons","onszelf","onze","ook","op","opnieuw","opzij","over",
                "overeind","overigens","pas","precies","reeds","rond","rondom","sedert","sinds","sindsdien","slechts","sommige","spoedig","steeds","tamelijk","tenzij","terwijl","thans","tijdens","toch","toen",
                "toenmaals","toenmalig","tot","totdat","tussen","uit","uitgezonderd","vaakwat","van","vandaan","vanuit","vanwege","veeleer","verder","vervolgens","vol","volgens","voor","vooraf","vooral","vooralsnog",
                "voorbij","voordat","voordezen","voordien","voorheen","voorop","vooruit","vrij","vroeg","waar","waarom","wanneer","want","waren","was","weer","weg","wegens","wel","weldra","welk","welke","wie","wiens","wier",
                "wij","wijzelf","zal","ze","zelfs","zichzelf","zij","zijn","zijne","zo","zodra","zonder","zou","zouden","zowat","zulke","zullen","zult","","","","","aan","al","alles","als","altijd","andere","ben","bij","daar","dan",
                "dat","de","der","deze","die","dit","doch","doen","door","dus","een","eens","en","er","ge","geen","geweest","haar","had","heb","hebben","heeft","hem","het","hier","hij","hoe","hun","iemand","iets","ik",
                "in","is","ja","je","kan","kon","kunnen","maar","me","meer","men","met","mij","mijn","moet","na","naar","niet","niets","nog","nu","of","om","omdat","onder","ons","ook","op","over","reeds","te","tegen",
                "toch","toen","tot","u","uit","uw","van","veel","voor","want","waren","was","wat","werd","wezen","wie","wil","worden","wordt","zal","ze","zelf","zich","zij","zijn","zo","zonder","zou"
            ];
        },
    }
}
