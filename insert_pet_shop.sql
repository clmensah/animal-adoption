USE pet_shop;  -- Select the database.

-- insert data into the database
delete from users;
INSERT INTO users (firstName, lastName, email, password) VALUES
('John', 'Smith', 'johnsmith@gmail.com', 'password');

delete from animals;
INSERT INTO animals (name, picture, species, breed, gender, age, size, personality, description) VALUES
('Angel', 'images/angel.jpeg', 'Dog', 'Corgi', 'Female', 'Adult', 'Small', 'affectionate',
  'Angel is a 5 year old Corgi who has been without a home for too long! She is loving girl and needs a fellow homebody to keep her constant company. Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  ),
('Bartholomew', 'images/bartholomew.jpeg', 'Cat', 'Calico Tabby', 'Male', 'Adult', 'Medium', 'affectionate',
  'Bartholomew is a 7 year old Calico Tabby looking for an exciting home. He is a charismatic boy who is very comfortable with other people and pets but always loves to be the center of attention. His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('Lucas', 'images/lucas.jpeg', 'Dog', 'Golden Retriever', 'Male', 'Child', 'Large', 'energetic',
  'Lucas is an energetic 2 year old Golden Retriever looking for a playmate. He is a very talkative boy who wants to play and chat all day. Could your home be right for him? His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('The Destroyer', 'images/thedestroyer.jpeg', 'Cat', 'Van Cat', 'Female', 'Child', 'Small', 'affectionate',
  'The Destroyer is our lovable, 6 month old kitten. She is a naturally energetic cat who will need constant attention and potty-training, but her love and affection will prove unforgettable. Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  ),
('Cherry', 'images/cherry.jpeg', 'Dog', 'Dacshund', 'Female', 'Adult', 'Small', 'calm',
  'Cherry is our 11 year long-haired Dacshund who wants nothing more than a quiet home and a warm lap to cuddle on. In her old age, she prefers short walks in the park and a long naps in the sun. Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  ),
('Chester The Great', 'images/chesterthegreat.jpeg', 'Guinea Pig', 'Coronet', 'Male', 'Adult', 'Small', 'calm',
  'Chester the Great is our magnificnet Coronet Guinea Pig. He''s 3 years old and proud, and he would prefer to have a side-kick as long as they are a Guinea Pig, too. Nothing but good days ahead of this guy! His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('Choccy', 'images/choccy.jpeg', 'Dog', 'Jagdterrier', 'Male', 'Child', 'Small', 'energetic',
  'Choccy is a adorable 1 year old puppy looking for a happy household. He''s an excitable dog that loves to play fetch and can perform a couple tricks as long as he''s guaranteed a delicious treat! His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('Daisy', 'images/daisy.jpeg', 'Dog', 'Golden Retriever', 'Female', 'Child', 'Small', 'energetic',
  'Daisy is our 3 month old Golden Retriever puppy that wants nothing more than to play all day. She''s looking for an exciatable home and a place that doesn''t mind a messy pet! Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  ),
('Darling', 'images/darling.jpeg', 'Dog', 'Golden Retriever', 'Female', 'Adult', 'Large', 'affectionate',
  'Darling is a darling 3 year old Golden Retriever who''s looking for a forever home. She is a very sweet and well-trained girl. Make sure to keep the shoes out of her reach, though! Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  ),
('Doja Cat', 'images/dojacat.jpeg', 'Cat', 'Calico Tabby', 'Female', 'Adult', 'Medium', 'calm',
  'The dramatic Doja Cat is our 2 year old Calico Tabby who is picky about most things but lenient when it comes to other pets. In the end, all she needs is a fluffy bed to sleep in and a loving owner for her to be happy. Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  ),
('Gaston', 'images/gaston.jpeg', 'Dog', 'Husky', 'Male', 'Child', 'Large', 'energetic',
  'Gaston is a pretty but dramatic, 8 month old Husky. His antics are always endearing, but be prepared for a very whiney puppy. Nothing a quick jog outside won''t fix! His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('Henry', 'images/henry.jpeg', 'Dog', 'Husky', 'Male', 'Adult', 'Large', 'calm',
  'Henry is our gorgeous, 5 year adult Husky. He''s very protective of his companions, and you will never feel another lonely minute with this guy around. He''s quite adaptable to most circumstances as long as he''s shown a lot of love. His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('Katara', 'images/katara.jpeg', 'Cat', 'Tabby', 'Female', 'Child', 'Small', 'energetic',
  'Katara is an adorable 10 month old kitten with a passion to explore the world! ...Once she''s potty-trained, of course. Luckily, this girl is a quick learner! Pair her up with a playmate, and she''ll be as content as any young cat can be. Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  ),
('Lu', 'images/lu.jpeg', 'Dog', 'Pug', 'Female', 'Child', 'Small', 'energetic',
  'Lu is an unforgettable and lovable 2 year old Pug who will steal your heart the second you meet her! She loves running in tide pools at the beach and playing tags with any other dog willing to play. Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  ),
('Mac N Cheese', 'images/macncheese.jpeg', 'Cat', 'Tabby', 'Male', 'Adult', 'Medium', 'calm',
  'Mac N Cheese is our adorable old man with an approximate 10 years on his belt. He''s adaptable to any environment, all he asks for is a warm spot in the sun and daily pets. His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('Mac', 'images/mac.jpeg', 'Rabbit', 'Blanc de Hotot', 'Male', 'Adult', 'Small', 'affectionate',
  'This boy isn''t messing around! Mac is our 3 year old rabbit with a picky preference and a big personality. He doesn''t choose his companions lightly, but when he does, you two will be inseparable. His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('Macklemore', 'images/macklemore.jpeg', 'Dog', 'Labrador Retriever', 'Male', 'Adult', 'Large', 'calm',
  'Macklemore is our beloved, 10 year old Labrador Retriever. Although he''s got some years on him, he''s still eager to got out for early morning runs. He''s a very well-behaved boy looking for a forever friend. His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('Red', 'images/red.jpeg', 'Dog', 'Doberman Pinscher', 'Female', 'Adult', 'Large', 'energetic',
  'Red is a 4 year old cutie patootie. She''s a very hyper Doberman Pinscher who gets excited for any visitor that comes over. Make sure to give her plenty of playtime! Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  ),
('Sammy', 'images/sammy.jpeg', 'Cat', 'Tabby', 'Male', 'Adult', 'Medium', 'energetic',
  'Sammy is a dog-like, 6 year old cat who loves his fair share of fetch games. For any lucky person who has the pleasure of being his companion, make sure to give him lots of treats and love! His shots are all up to date, he''s fully neutered, and he''s ready for a home!'
  ),
('Baby', 'images/baby.jpeg', 'Cat', 'Snowshoe', 'Female', 'Adult', 'Medium', 'calm',
  'Baby is our adorable 7 year old Snowshoe cat. She prefers a quiet home, but does not mind the additional pets that might keep her company. As soon as she has a lap to curl up on, she''s content. Her shots are all up to date, she''s fully neutered, and she''s ready for a home!'
  );
