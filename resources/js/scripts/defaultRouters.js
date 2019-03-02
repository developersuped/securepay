module.exports.routers = [
    {path: "/find/:text", component: {template: "<finditem ref='finditem'/>"}},
    {path: "**", component: {template: "<notfund ref='notfund'/>"}}
];
