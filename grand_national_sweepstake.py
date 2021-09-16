import random
import csv

favs1 = ['Burrows Saint', 'Magic Of Light', 'Any Second Now', 'Takingrisks', 'Cloth Cap', 'Minella Times']

favs2 = ['Kimberlite Candy', 'Mister Malarky', 'Discorama', 'Acapella Bourgeois', 'Potters Corner', 'Farclas']

remaining = ['Bristol De Mai', 'Chris\'s Dream', 'Yala Enki', 'Ballyoptic', 'Definitly Red', 'Lake View Lad', 'Talkischeap', 'Tout Est Permis', 'Anibale Fly', 'Balko Des Flos', 'Alpha Des Obeaux', 'OK Corral', 'Shattered Love', 'Jett', 'Lord Du Mesnil', 'Class Conti', 'Milan Native', 'Vieux Lion Rouge', 'Cabaret Queen', 'Minellacelebration', 'Canelo', 'The Long Mile', 'Give Me A Copper', 'Sub Lieutenant', 'Hogan\'s Height', 'Double Shuffle', 'Ami Desbois', 'Blaklion']

entries = ['Dad', 'Mum', 'Sibling 1', 'Sibling 2', 'Sibling 3', 'Sibling 4']

draw = {}

for entrant in entries:
    randomfav1 = random.choice(favs1)
    favs1.remove(randomfav1)

    randomfav2 = random.choice(favs2)
    favs2.remove(randomfav2)

    draw[entrant] = [randomfav1, randomfav2]

    randomremaining = random.sample(remaining, 4)
    draw[entrant].extend(randomremaining)
    for horse in randomremaining:
        remaining.remove(horse)

    # give the siblings the remaining horses
    if entrant != "Dad" and entrant != "Mum":
        randomremaining2 = random.choice(remaining)
        draw[entrant].append(randomremaining2)
        remaining.remove(randomremaining2)
    else:
        draw[entrant].append("")

#print(draw)

# transpose the data so it is formatted correctly for the csv file
data = [dict(zip(draw, col)) for col in zip(*draw.values())]
#print(data)

# output the data to a csv file
with open('Grand National.csv', 'w', newline='') as csv_file:
    writer = csv.DictWriter(csv_file, fieldnames=entries)
    writer.writeheader()
    writer.writerows(data)