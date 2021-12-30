class Book {
  final int id;
  final String name;
  final String locate;
  final int rating;
  final String thumbnail;

  const Book({
    required this.id,
    required this.name,
    required this.locate,
    required this.rating,
    required this.thumbnail,
  });

  factory Book.fromJson(Map<String, dynamic> json) => Book(
        id: json['id'],
        name: json['name'],
        locate: json['locate'],
        rating: json['rating'],
        thumbnail: json['thumbnail'],
      );

  Map<String, dynamic> toJson() => {
        'id': id,
        'name': name,
        'locate': locate,
        'rating': rating,
        'thumbnail': thumbnail,
      };
}
