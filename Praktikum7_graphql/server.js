const express = require("express");
const expressGraphQL = require("express-graphql").graphqlHTTP;
const { GraphQLSchema,
    GraphQLObjectType,
    GraphQLString,
    GraphQLList,
    GraphQLNonNull } = require("graphql");
const app = express();

const daftarmahasiswa = [
  {
    nrp: "1872019",
    nama: "Ryan",
    foto: "ryan.jpg",
    prodi: "Teknik Informatika",
    fakultas: "Teknologi Informasi",
    universitas: "Luar Biasa",
  },
  {
    nrp: "1872047",
    nama: "Steven",
    foto: "steven.jpg",
    prodi: "Teknik Informatika",
    fakultas: "Teknologi Informasi",
    universitas: "Indonesia",
  },
  {
    nrp: "1872058",
    nama: "Aldrich",
    foto: "aldrich.jpg",
    prodi: "Teknik Pertanian",
    fakultas: "Teknologi Pertanian",
    universitas: "Maranatha",
  },
];

const MahasiswaType = new GraphQLObjectType({
  name: "Mahasiswa",
  description: "Data",
  fields: () => ({
    nrp: { type: GraphQLNonNull(GraphQLString) },
    nama: { type: GraphQLNonNull(GraphQLString) },
    foto: { type: GraphQLNonNull(GraphQLString) },
    prodi: { type: GraphQLNonNull(GraphQLString) },
    fakultas: { type: GraphQLNonNull(GraphQLString) },
    universitas: { type: GraphQLNonNull(GraphQLString) },
  }),
});

const RootQueryType = new GraphQLObjectType({
  name: "Query",
  description: "Root Query",
  fields: () => ({
    daftarmahasiswa: {
      type: new GraphQLList(MahasiswaType),
      description: "Daftar mahasiswa",
      resolve: () => daftarmahasiswa,
    }
  }),
});

const RootMutationType = new GraphQLObjectType({
    name: 'Mutation',
    description: 'Root Mutation',
    fields: () => ({
      addMahasiswa: {
        type: MahasiswaType,
        description: 'Add mahasiswa',
        args: {
            nrp: { type: GraphQLNonNull(GraphQLString) },
            nama: { type: GraphQLNonNull(GraphQLString) },
            foto: { type: GraphQLNonNull(GraphQLString) },
            prodi: { type: GraphQLNonNull(GraphQLString) },
            fakultas: { type: GraphQLNonNull(GraphQLString) },
            universitas: { type: GraphQLNonNull(GraphQLString) },
        },
        resolve: (parent, args) => {
          const mahasiswa = { nrp: args.nrp, nama: args.nama, foto: args.foto,
                            prodi: args.prodi, fakultas: args.fakultas, universitas: args.universitas, }
          daftarmahasiswa.push(mahasiswa)
          return mahasiswa
        }
      },
    })
  })


const schema = new GraphQLSchema({
    query: RootQueryType,
    mutation: RootMutationType
  })
app.use("/graphql",expressGraphQL({
    schema: schema,
    graphiql: true,
  }));
app.listen(5000, () => console.log("Server Running"));
