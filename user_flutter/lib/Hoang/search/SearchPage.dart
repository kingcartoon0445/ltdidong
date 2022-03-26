import 'package:flutter/material.dart';
import 'diadanh_data.dart';
import 'diadanh_model.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';

class SearchPage extends StatefulWidget {
  @override
  State<StatefulWidget> createState() {
    return SearchPageState();
  }
}

class SearchPageState extends State<SearchPage> {
  late List<Book> books;
  final txtSearchInput = TextEditingController();

  @override
  void initState() {
    super.initState();
    books = allBooks;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title:  Padding(
              padding: EdgeInsets.symmetric(vertical: 12),
              child: Container(
                decoration: BoxDecoration(
                  color: Colors.white,
                  borderRadius: BorderRadius.circular(18),
                ),
                child: TextField(
                  onChanged: (value) {
                    final books = allBooks.where((book) {
                      final titleLower = book.name.toLowerCase();
                      final searchLower = value.toLowerCase();

                      return titleLower.contains(searchLower);
                    }).toList();

                    setState(() {
                      this.books = books;
                    });
                  },
                  controller: txtSearchInput,
                  decoration: InputDecoration(
                    contentPadding: EdgeInsets.symmetric(vertical: 20),
                    border: InputBorder.none,
                    hintText: 'Search...',
                    prefixIcon: Padding(
                      padding: EdgeInsets.symmetric(horizontal: 20),
                      child: Icon(Icons.search, size: 25, color: Colors.black54),
                    ),
                    hintStyle: TextStyle(fontSize: 15, color: Colors.black54),
                  ),
                  style: TextStyle(fontSize: 15, color: Colors.black),
                ),
              ),
            ),
            
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
           Expanded(
              child: ListView.builder(
                itemCount: books.length,
                itemBuilder: (context, index) {
                  return Padding(
                    padding: EdgeInsets.symmetric(horizontal: 6),
                    child: Card(
                      clipBehavior: Clip.antiAlias,
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(5),
                      ),
                      child: Row(
                        children: [
                          Ink(
                            height: 100,
                            width: 100,
                            decoration: BoxDecoration(
                              color: Colors.blueGrey,
                              image: DecorationImage(
                                fit: BoxFit.cover,
                                image: NetworkImage(books[index].thumbnail),
                              ),
                            ),
                          ),
                          Flexible(
                            child: Padding(
                              padding: const EdgeInsets.all(15),
                              child: Column(
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  Text(
                                    books[index].name,
                                    overflow: TextOverflow.ellipsis,
                                    style: TextStyle(fontSize: 15, fontWeight: FontWeight.bold),
                                  ),
                                  SizedBox(height: 7),
                                  Row(
                                    children: [
                                      Icon(
                                        Icons.location_on,
                                        color: Colors.red,
                                        size: 15,
                                      ),
                                      SizedBox(width: 5),
                                      Text(books[index].locate),
                                    ],
                                  ),
                                  SizedBox(height: 7),
                                  RatingBarIndicator(
                                    rating: double.parse(books[index].rating.toString()),
                                    itemBuilder: (_, __) {
                                      return Icon(
                                        Icons.star,
                                        color: Colors.amber,
                                      );
                                    },
                                    itemSize: 20,
                                  ),
                                ],
                              ),
                            ),
                          ),
                        ],
                      ),
                    ),
                  );
                },
              ),
            ),
          ],
        ),
      ),
    );
  }
}
